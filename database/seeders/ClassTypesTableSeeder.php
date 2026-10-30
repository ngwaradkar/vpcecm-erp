<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * VPCCECM Programme Streams
     * BC = B.Com. (Goa University, NEP 2020 / CBCS OC-66)
     * BE = B.A.B.Ed. (4-Year Integrated, NCTE / OC-54)
     * PG = Postgraduate Centre (IGNOU Study Centre)
     * VC = Vocational & Certificate Programmes
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'Undergraduate Commerce (B.Com.)', 'code' => 'BC'],
            ['name' => 'Teacher Education (B.A.B.Ed.)', 'code' => 'BE'],
            ['name' => 'Postgraduate (IGNOU)', 'code' => 'PG'],
            ['name' => 'Vocational & Certificate', 'code' => 'VC'],
        ];

        DB::table('class_types')->insert($data);
    }
}
