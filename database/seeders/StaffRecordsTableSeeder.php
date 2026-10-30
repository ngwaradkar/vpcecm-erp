<?php
namespace Database\Seeders;

use App\User;
use App\Helpers\Qs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StaffRecordsTableSeeder extends Seeder
{
    /**
     * Seed staff records for all teachers, leadership, librarians, and administrative staff
     */
    public function run()
    {
        DB::table('staff_records')->delete();

        $staffUsers = User::whereIn('user_type', Qs::getStaff())->get();

        $records = [];
        foreach ($staffUsers as $index => $user) {
            $records[] = [
                'user_id' => $user->id,
                'code' => 'VPC/STF/' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'emp_date' => '2015-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('staff_records')->insert($records);
    }
}
