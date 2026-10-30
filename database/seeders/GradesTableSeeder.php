<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesTableSeeder extends Seeder
{
    /**
     * Goa University 10-Point Letter Grading Scale (NEP 2020 / CBCS OC-66 & OC-54)
     */
    public function run()
    {
        DB::table('grades')->delete();
        $this->createGrades();
    }

    protected function createGrades()
    {
        $d = [
            ['name' => 'O', 'mark_from' => 85, 'mark_to' => 100, 'remark' => 'Outstanding'],
            ['name' => 'A+', 'mark_from' => 75, 'mark_to' => 84, 'remark' => 'Excellent'],
            ['name' => 'A', 'mark_from' => 65, 'mark_to' => 74, 'remark' => 'Very Good'],
            ['name' => 'B+', 'mark_from' => 55, 'mark_to' => 64, 'remark' => 'Good'],
            ['name' => 'B', 'mark_from' => 50, 'mark_to' => 54, 'remark' => 'Above Average'],
            ['name' => 'C', 'mark_from' => 45, 'mark_to' => 49, 'remark' => 'Average'],
            ['name' => 'P', 'mark_from' => 40, 'mark_to' => 44, 'remark' => 'Pass'],
            ['name' => 'F', 'mark_from' => 0, 'mark_to' => 39, 'remark' => 'Fail'],
        ];
        DB::table('grades')->insert($d);
    }
}
