<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DormsTableSeeder extends Seeder
{
    /**
     * VPCCECM Student Accommodation / Hostels
     * Linkage with Akhiviraj Guest House, Porvorim for outstation students
     */
    public function run()
    {
        DB::table('dorms')->delete();
        $data = [
            ['name' => 'Akhiviraj Student Residency (Boys Wing)'],
            ['name' => 'Akhiviraj Student Residency (Girls Wing)'],
            ['name' => 'Porvorim Campus Scholars Home'],
        ];
        DB::table('dorms')->insert($data);
    }
}
