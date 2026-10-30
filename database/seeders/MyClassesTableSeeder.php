<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyClassesTableSeeder extends Seeder
{
    /**
     * VPCCECM Cohorts / Year-Groups
     * B.Com.: F.Y. (Sem I-II), S.Y. (Sem III-IV), T.Y. (Sem V-VI)
     * B.A.B.Ed.: F.Y. (Sem I-II), S.Y. (Sem III-IV), T.Y. (Sem V-VI), Fo.Y. (Sem VII-VIII)
     * IGNOU PG: M.A. Rural Development, M.Sc. Geography
     * Vocational: Tally ERP 9 with GST
     */
    public function run()
    {
        DB::table('my_classes')->delete();
        $ct = ClassType::pluck('id', 'code')->all();

        $data = [
            // B.Com. Programme (index 0-2)
            ['name' => 'F.Y.B.Com (Sem I & II)', 'class_type_id' => $ct['BC']],
            ['name' => 'S.Y.B.Com (Sem III & IV)', 'class_type_id' => $ct['BC']],
            ['name' => 'T.Y.B.Com (Sem V & VI)', 'class_type_id' => $ct['BC']],

            // B.A.B.Ed. Programme (index 3-6)
            ['name' => 'F.Y.B.A.B.Ed (Sem I & II)', 'class_type_id' => $ct['BE']],
            ['name' => 'S.Y.B.A.B.Ed (Sem III & IV)', 'class_type_id' => $ct['BE']],
            ['name' => 'T.Y.B.A.B.Ed (Sem V & VI)', 'class_type_id' => $ct['BE']],
            ['name' => 'Fo.Y.B.A.B.Ed (Sem VII & VIII)', 'class_type_id' => $ct['BE']],

            // IGNOU PG (index 7-8)
            ['name' => 'M.A. Rural Development (IGNOU)', 'class_type_id' => $ct['PG']],
            ['name' => 'M.Sc. Geography (IGNOU)', 'class_type_id' => $ct['PG']],

            // Vocational (index 9)
            ['name' => 'Tally ERP 9 with GST (30 Hrs)', 'class_type_id' => $ct['VC']],
        ];

        DB::table('my_classes')->insert($data);
    }
}
