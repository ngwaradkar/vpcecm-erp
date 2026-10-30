<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Vidya Prabodhini College of Commerce, Education, Computer and Management (VPCCECM)
     * Prabodhan Education Society, Parvari (Porvorim) - Goa
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['type' => 'current_session', 'description' => '2026-2027'],
            ['type' => 'system_title', 'description' => 'VPCCECM'],
            ['type' => 'system_name', 'description' => 'Vidya Prabodhini College of Commerce, Education, Computer and Management'],
            ['type' => 'term_ends', 'description' => '30/04/2027'],
            ['type' => 'term_begins', 'description' => '15/06/2026'],
            ['type' => 'phone', 'description' => '(0832) 2410500'],
            ['type' => 'address', 'description' => 'Vidya Nagar, Alto, Parvari (Porvorim) - Goa, PIN: 403521'],
            ['type' => 'system_email', 'description' => 'info@vidyaprabodhinicollege.edu.in'],
            ['type' => 'alt_email', 'description' => 'vidyaprabodhinigoa@gmail.com'],
            ['type' => 'email_host', 'description' => ''],
            ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => '/assets/images/college_emblem.png'],
            // Fee tiers mapped to class type codes
            ['type' => 'next_term_fees_bc', 'description' => '2000'],   // B.Com. Annual Tuition
            ['type' => 'next_term_fees_be', 'description' => '6000'],   // B.A.B.Ed. Annual Tuition
            ['type' => 'next_term_fees_pg', 'description' => '5000'],   // IGNOU PG Programmes
            ['type' => 'next_term_fees_vc', 'description' => '2000'],   // Tally ERP 9 / Vocational
        ];

        DB::table('settings')->insert($data);
    }
}
