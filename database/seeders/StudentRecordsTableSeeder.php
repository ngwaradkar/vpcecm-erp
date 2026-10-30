<?php

namespace Database\Seeders;

use App\Models\MyClass;
use App\Models\Section;
use App\Models\StudentRecord;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentRecordsTableSeeder extends Seeder
{
    /**
     * Seed Student Records for VPCCECM
     */
    public function run()
    {
        DB_truncate:
        \Illuminate\Support\Facades\DB::table('student_records')->delete();

        $classes = MyClass::all()->keyBy('name');
        $sections = Section::all();
        $parent = User::where('user_type', 'parent')->first();
        $parentId = $parent ? $parent->id : null;

        // Named students from VPCCECM Academic Rankers
        $namedStudents = [
            'student' => ['class' => 'Fo.Y.B.A.B.Ed (Sem VII & VIII)', 'adm_no' => 'VPC/BED/2018/01', 'year' => '2018-2019'],
            'suvidhya' => ['class' => 'Fo.Y.B.A.B.Ed (Sem VII & VIII)', 'adm_no' => 'VPC/BED/2021/04', 'year' => '2021-2022'],
            'gayatri' => ['class' => 'T.Y.B.Com (Sem V & VI)', 'adm_no' => 'VPC/COM/2021/12', 'year' => '2021-2022'],
            'vaishnavi' => ['class' => 'T.Y.B.Com (Sem V & VI)', 'adm_no' => 'VPC/COM/2020/09', 'year' => '2020-2021'],
            'rushali' => ['class' => 'Fo.Y.B.A.B.Ed (Sem VII & VIII)', 'adm_no' => 'VPC/BED/2020/15', 'year' => '2020-2021'],
        ];

        foreach ($namedStudents as $username => $data) {
            $user = User::where('username', $username)->first();
            if ($user && isset($classes[$data['class']])) {
                $targetClass = $classes[$data['class']];
                $section = $sections->where('my_class_id', $targetClass->id)->first();
                
                StudentRecord::create([
                    'user_id' => $user->id,
                    'my_class_id' => $targetClass->id,
                    'section_id' => $section ? $section->id : 1,
                    'adm_no' => $data['adm_no'],
                    'my_parent_id' => $parentId,
                    'session' => '2026-2027',
                    'year_admitted' => $data['year'],
                    'house' => 'Sanskrit Heritage',
                    'age' => 20,
                ]);
            }
        }

        // Additional cohort students for F.Y.B.Com and F.Y.B.A.B.Ed
        $cohortClasses = [
            'F.Y.B.Com (Sem I & II)',
            'F.Y.B.A.B.Ed (Sem I & II)',
            'S.Y.B.Com (Sem III & IV)',
        ];

        $roll = 101;
        foreach ($cohortClasses as $className) {
            if (!isset($classes[$className])) continue;
            $class = $classes[$className];
            $classSections = $sections->where('my_class_id', $class->id);

            foreach ($classSections as $sec) {
                for ($i = 1; $i <= 3; $i++) {
                    $u = User::create([
                        'name' => 'Scholar ' . Str::random(5),
                        'email' => 'scholar_' . $roll . '@student.com',
                        'username' => 'scholar_' . $roll,
                        'user_type' => 'student',
                        'password' => Hash::make('student'),
                        'code' => strtoupper(Str::random(10)),
                        'gender' => ($i % 2 == 0) ? 'Female' : 'Male',
                    ]);

                    StudentRecord::create([
                        'user_id' => $u->id,
                        'my_class_id' => $class->id,
                        'section_id' => $sec->id,
                        'adm_no' => 'VPC/2026/' . $roll,
                        'my_parent_id' => $parentId,
                        'session' => '2026-2027',
                        'year_admitted' => '2026-2027',
                        'house' => 'Parabodhini',
                        'age' => 19,
                    ]);

                    $roll++;
                }
            }
        }
    }
}
