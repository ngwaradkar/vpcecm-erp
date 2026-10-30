<?php
namespace Database\Seeders;

use App\Models\MyClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * VPCCECM Divisions & Batches
     * B.Com. has 2 divisions: Div A & Div B
     * B.A.B.Ed. has 100 sanctioned intake in 1 batch: Div A
     * IGNOU & Certificate courses have Batch 1
     */
    public function run()
    {
        DB::table('sections')->delete();
        $classes = MyClass::all();

        $data = [];
        foreach ($classes as $c) {
            if (str_contains($c->name, 'B.Com')) {
                // 2 Divisions for B.Com
                $data[] = ['name' => 'Division A', 'my_class_id' => $c->id, 'active' => 1];
                $data[] = ['name' => 'Division B', 'my_class_id' => $c->id, 'active' => 1];
            } elseif (str_contains($c->name, 'B.A.B.Ed')) {
                // 100 Seats cohort for B.A.B.Ed
                $data[] = ['name' => 'Division A', 'my_class_id' => $c->id, 'active' => 1];
            } else {
                // IGNOU and Vocational Batches
                $data[] = ['name' => 'Batch 1', 'my_class_id' => $c->id, 'active' => 1];
            }
        }

        DB::table('sections')->insert($data);
    }
}
