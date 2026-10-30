<?php

namespace Database\Seeders;

use App\Models\MyClass;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * VPCCECM Subjects mapped to departments and faculty members
     */
    public function run()
    {
        DB::table('subjects')->delete();
        $this->createSubjects();
    }

    protected function createSubjects()
    {
        $classes = MyClass::all()->keyBy('name');
        
        // Helper to find teacher ID by username or fallback to first teacher
        $teachers = User::where('user_type', 'teacher')->get()->keyBy('username');
        $fallbackTeacherId = $teachers->first()->id;

        $getTeacherId = function($username) use ($teachers, $fallbackTeacherId) {
            return isset($teachers[$username]) ? $teachers[$username]->id : $fallbackTeacherId;
        };

        $subjectMap = [
            // F.Y.B.Com
            'F.Y.B.Com (Sem I & II)' => [
                ['name' => 'Financial Accounting (COM-100)', 'slug' => 'COM-100', 'teacher' => 'dhanashrib'],
                ['name' => 'Principles & Practice of Management (COM-111)', 'slug' => 'COM-111', 'teacher' => 'arunmarathe'],
                ['name' => 'Mathematical Techniques / E-Commerce (MAT-131)', 'slug' => 'MAT-131', 'teacher' => 'pankajs'],
                ['name' => 'Communicative English (ENG-151)', 'slug' => 'ENG-151', 'teacher' => 'nikitas'],
                ['name' => 'Environmental Studies (VAC-100)', 'slug' => 'VAC-100', 'teacher' => 'prajaktap'],
                ['name' => 'Computer Applications for Business (COM-141)', 'slug' => 'COM-141', 'teacher' => 'sneham'],
                ['name' => 'Elements of Cost (COM-101)', 'slug' => 'COM-101', 'teacher' => 'arunmarathe'],
                ['name' => 'Fundamentals of Banking (COM-112)', 'slug' => 'COM-112', 'teacher' => 'sunnyp'],
            ],

            // S.Y.B.Com
            'S.Y.B.Com (Sem III & IV)' => [
                ['name' => 'Business Finance (UCOC105)', 'slug' => 'UCOC-105', 'teacher' => 'sunnyp'],
                ['name' => 'Fundamentals of Cost Accounting (UCOC106)', 'slug' => 'UCOC-106', 'teacher' => 'dhanashrib'],
                ['name' => 'Entrepreneurship Development (UCOC107)', 'slug' => 'UCOC-107', 'teacher' => 'darshang'],
                ['name' => 'Business Laws (UCLS101)', 'slug' => 'UCLS-101', 'teacher' => 'ujwalan'],
                ['name' => 'Business Statistics (UCAG101)', 'slug' => 'UCAG-101', 'teacher' => 'pankajs'],
                ['name' => 'Consumer Behaviour (UCOG132)', 'slug' => 'UCOG-132', 'teacher' => 'rudreshm'],
                ['name' => 'Fundamentals of Investment (UCOC108)', 'slug' => 'UCOC-108', 'teacher' => 'sunnyp'],
                ['name' => 'Income Tax (UCOC109)', 'slug' => 'UCOC-109', 'teacher' => 'varshai'],
            ],

            // T.Y.B.Com
            'T.Y.B.Com (Sem V & VI)' => [
                ['name' => 'Industrial Management (UCOC111)', 'slug' => 'UCOC-111', 'teacher' => 'arunmarathe'],
                ['name' => 'Indian Monetary & Financial System (UCEC103)', 'slug' => 'UCEC-103', 'teacher' => 'swetab'],
                ['name' => 'Income Tax & GST (UCOD101)', 'slug' => 'UCOD-101', 'teacher' => 'varshai'],
                ['name' => 'Cost Accounting I & II (UCOD102)', 'slug' => 'UCOD-102', 'teacher' => 'darshang'],
                ['name' => 'International Marketing (UCOD103)', 'slug' => 'UCOD-103', 'teacher' => 'pinkeshd'],
                ['name' => 'Advanced Company Accounts (UCOD117)', 'slug' => 'UCOD-117', 'teacher' => 'pinkeshd'],
                ['name' => 'Advanced Cost Accounting (UCOD118)', 'slug' => 'UCOD-118', 'teacher' => 'rudreshm'],
                ['name' => 'Compulsory Research Project (UCOP101)', 'slug' => 'UCOP-101', 'teacher' => 'arunmarathe'],
            ],

            // F.Y.B.A.B.Ed
            'F.Y.B.A.B.Ed (Sem I & II)' => [
                ['name' => 'Childhood & Growing Up (Pedagogy)', 'slug' => 'EDU-101', 'teacher' => 'anilthosare'],
                ['name' => 'Physical Geography & Geomorphology', 'slug' => 'GEO-101', 'teacher' => 'sagarm'],
                ['name' => 'History of Modern India', 'slug' => 'HIS-101', 'teacher' => 'yogitag'],
                ['name' => 'English Language & Literature', 'slug' => 'ENG-101', 'teacher' => 'kedarnatht'],
                ['name' => 'Hindi Sahitya evam Vyakaran', 'slug' => 'HIN-101', 'teacher' => 'priyag'],
                ['name' => 'Konkani Bhas ani Sahitya', 'slug' => 'KON-101', 'teacher' => 'darshank'],
                ['name' => 'Fine Arts & Aesthetic Education', 'slug' => 'ART-101', 'teacher' => 'kalidasm'],
            ],

            // S.Y.B.A.B.Ed
            'S.Y.B.A.B.Ed (Sem III & IV)' => [
                ['name' => 'Learning & Teaching Processes', 'slug' => 'EDU-201', 'teacher' => 'sonalis'],
                ['name' => 'Human & Economic Geography', 'slug' => 'GEO-201', 'teacher' => 'uaddhavp'],
                ['name' => 'Indian History & Culture', 'slug' => 'HIS-201', 'teacher' => 'adityaw'],
                ['name' => 'English Methodology & ELT', 'slug' => 'ENG-201', 'teacher' => 'saishd'],
                ['name' => 'Marathi Sahitya', 'slug' => 'MAR-201', 'teacher' => 'kuldeepk'],
                ['name' => 'Theatre & Performing Arts', 'slug' => 'DRA-201', 'teacher' => 'anineshs'],
            ],

            // T.Y.B.A.B.Ed
            'T.Y.B.A.B.Ed (Sem V & VI)' => [
                ['name' => 'Assessment for Learning', 'slug' => 'EDU-301', 'teacher' => 'anilthosare'],
                ['name' => 'Geographic Information Systems (GIS)', 'slug' => 'GEO-301', 'teacher' => 'sagarm'],
                ['name' => 'Educational Technology & ICT', 'slug' => 'EDU-302', 'teacher' => 'manishak'],
                ['name' => 'Gomantakiya Sahitya', 'slug' => 'MAR-301', 'teacher' => 'yogitac'],
            ],

            // Fo.Y.B.A.B.Ed
            'Fo.Y.B.A.B.Ed (Sem VII & VIII)' => [
                ['name' => 'School Internship & Practice Teaching', 'slug' => 'PRAC-401', 'teacher' => 'anilthosare'],
                ['name' => 'Inclusive Education & Guidance', 'slug' => 'EDU-401', 'teacher' => 'sonalis'],
                ['name' => 'Working with Community & Health Ed', 'slug' => 'EXT-401', 'teacher' => 'sunnykanekar'],
            ],

            // IGNOU Programmes
            'M.A. Rural Development (IGNOU)' => [
                ['name' => 'Rural Development Policies & Strategies', 'slug' => 'MRD-101', 'teacher' => 'shamald'],
                ['name' => 'Research Methodology in Rural Development', 'slug' => 'MRD-102', 'teacher' => 'rudreshm'],
            ],
            'M.Sc. Geography (IGNOU)' => [
                ['name' => 'Advanced Geoinformatics & Remote Sensing', 'slug' => 'MGEO-101', 'teacher' => 'sagarm'],
                ['name' => 'Climatology & Oceanography', 'slug' => 'MGEO-102', 'teacher' => 'deekshan'],
            ],

            // Vocational
            'Tally ERP 9 with GST (30 Hrs)' => [
                ['name' => 'Tally ERP 9 with GST Practical Certification', 'slug' => 'TALLY-30', 'teacher' => 'girishk'],
            ],
        ];

        foreach ($subjectMap as $className => $subs) {
            if (isset($classes[$className])) {
                $classId = $classes[$className]->id;
                foreach ($subs as $sub) {
                    DB::table('subjects')->insert([
                        'name' => $sub['name'],
                        'slug' => $sub['slug'],
                        'my_class_id' => $classId,
                        'teacher_id' => $getTeacherId($sub['teacher']),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
