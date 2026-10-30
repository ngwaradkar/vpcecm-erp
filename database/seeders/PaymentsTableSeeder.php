<?php
namespace Database\Seeders;

use App\Models\MyClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentsTableSeeder extends Seeder
{
    /**
     * VPCCECM Statutory Fee Structure
     * B.Com. Tuition: Rs. 2,000/yr
     * B.A.B.Ed. Tuition: Rs. 6,000/yr
     * Exam Fees: Rs. 1,500
     * Tally ERP 9: Rs. 2,000
     */
    public function run()
    {
        DB::table('payments')->delete();
        $classes = MyClass::all()->keyBy('name');

        $payments = [];

        // 1. B.Com Fees
        $bcomClasses = ['F.Y.B.Com (Sem I & II)', 'S.Y.B.Com (Sem III & IV)', 'T.Y.B.Com (Sem V & VI)'];
        foreach ($bcomClasses as $name) {
            if (isset($classes[$name])) {
                $cid = $classes[$name]->id;
                $payments[] = [
                    'title' => 'Annual Tuition Fee (B.Com)',
                    'amount' => 2000,
                    'ref_no' => 'PAY/BCOM/' . $cid . '/' . strtoupper(Str::random(5)),
                    'method' => 'online',
                    'my_class_id' => $cid,
                    'description' => 'Statutory base tuition fee approved by Goa University & DHE Goa',
                    'year' => '2026-2027',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $payments[] = [
                    'title' => 'Semester Examination Fee',
                    'amount' => 1500,
                    'ref_no' => 'PAY/EXAM/' . $cid . '/' . strtoupper(Str::random(5)),
                    'method' => 'online',
                    'my_class_id' => $cid,
                    'description' => 'Goa University Semester End Examination assessment fee',
                    'year' => '2026-2027',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // 2. B.A.B.Ed Fees
        $bedClasses = [
            'F.Y.B.A.B.Ed (Sem I & II)',
            'S.Y.B.A.B.Ed (Sem III & IV)',
            'T.Y.B.A.B.Ed (Sem V & VI)',
            'Fo.Y.B.A.B.Ed (Sem VII & VIII)'
        ];
        foreach ($bedClasses as $name) {
            if (isset($classes[$name])) {
                $cid = $classes[$name]->id;
                $payments[] = [
                    'title' => 'Annual Tuition Fee (B.A.B.Ed)',
                    'amount' => 6000,
                    'ref_no' => 'PAY/BED/' . $cid . '/' . strtoupper(Str::random(5)),
                    'method' => 'online',
                    'my_class_id' => $cid,
                    'description' => '4-Year Integrated Teacher Education annual tuition approved under NCTE & OC-54',
                    'year' => '2026-2027',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $payments[] = [
                    'title' => 'Practicum & Teaching Internship Fee',
                    'amount' => 2500,
                    'ref_no' => 'PAY/PRAC/' . $cid . '/' . strtoupper(Str::random(5)),
                    'method' => 'cash',
                    'my_class_id' => $cid,
                    'description' => 'Laboratory, micro-teaching, and partner school internship maintenance',
                    'year' => '2026-2027',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // 3. Vocational Tally
        if (isset($classes['Tally ERP 9 with GST (30 Hrs)'])) {
            $cid = $classes['Tally ERP 9 with GST (30 Hrs)']->id;
            $payments[] = [
                'title' => 'Tally ERP 9 with GST Certification Fee',
                'amount' => 2000,
                'ref_no' => 'PAY/TALLY/' . strtoupper(Str::random(5)),
                'method' => 'online',
                'my_class_id' => $cid,
                'description' => 'Tally Institute of Learning (TIL) digital verifiable certificate exam and lab training',
                'year' => '2026-2027',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('payments')->insert($payments);
    }
}
