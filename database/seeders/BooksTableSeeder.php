<?php
namespace Database\Seeders;

use App\Models\MyClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * VPCCECM KOHA Automated Library Catalog
     * Total Holdings: 9,862 Books, 23 Journals, 12 Magazines, 17 Newspapers
     */
    public function run()
    {
        DB::table('books')->delete();
        $classes = MyClass::all()->keyBy('name');

        $bcomClassId = isset($classes['F.Y.B.Com (Sem I & II)']) ? $classes['F.Y.B.Com (Sem I & II)']->id : null;
        $bedClassId = isset($classes['F.Y.B.A.B.Ed (Sem I & II)']) ? $classes['F.Y.B.A.B.Ed (Sem I & II)']->id : null;

        $books = [
            // Commerce & Management
            [
                'name' => 'Financial Accounting: Principles and Applications',
                'my_class_id' => $bcomClassId,
                'description' => 'Comprehensive financial accounting textbook for FYBCom NEP 2020 syllabus',
                'author' => 'Dr. S. N. Maheshwari & Dr. S. K. Maheshwari',
                'book_type' => 'Hardcover / Reference',
                'url' => 'https://vidyaprabodhinicollege.edu.in/college_library/',
                'location' => 'Shelf COM-A1 (KOHA 001.42)',
                'total_copies' => 45,
                'issued_copies' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Principles and Practice of Management',
                'my_class_id' => $bcomClassId,
                'description' => 'Standard reference book for general management and organizational structure',
                'author' => 'L. M. Prasad',
                'book_type' => 'Paperback',
                'url' => 'https://vidyaprabodhinicollege.edu.in/college_library/',
                'location' => 'Shelf MGT-B2 (KOHA 658.01)',
                'total_copies' => 38,
                'issued_copies' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cost Accounting: Principles and Practices',
                'my_class_id' => $bcomClassId,
                'description' => 'Methods and techniques of costing for commerce students and professional courses',
                'author' => 'M. N. Arora',
                'book_type' => 'Hardcover',
                'url' => 'https://vidyaprabodhinicollege.edu.in/college_library/',
                'location' => 'Shelf ACC-C1 (KOHA 657.42)',
                'total_copies' => 30,
                'issued_copies' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Direct Taxes: Law & Practice',
                'my_class_id' => $bcomClassId,
                'description' => 'Income tax, GST, and corporate taxation reference volume',
                'author' => 'Dr. Vinod K. Singhania & Dr. Kapil Singhania',
                'book_type' => 'Law Volume',
                'url' => 'https://vidyaprabodhinicollege.edu.in/college_library/',
                'location' => 'Shelf TAX-D1 (KOHA 343.04)',
                'total_copies' => 25,
                'issued_copies' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Teacher Education (B.A.B.Ed.)
            [
                'name' => 'Childhood and Adolescence: Development in Indian Context',
                'my_class_id' => $bedClassId,
                'description' => 'Child psychology and foundational pedagogy for 4-year integrated teacher education',
                'author' => 'Dr. Anil T. Thosare',
                'book_type' => 'Academic Monograph',
                'url' => 'https://vidyaprabodhinicollege.edu.in/college_library/',
                'location' => 'Shelf EDU-E1 (KOHA 370.15)',
                'total_copies' => 50,
                'issued_copies' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Physical Geography: Hydrology, Climatology and Geomorphology',
                'my_class_id' => $bedClassId,
                'description' => 'Geomorphological processes, remote sensing, and GIS applications',
                'author' => 'Dr. Savindra Singh',
                'book_type' => 'Reference Text',
                'url' => 'https://vidyaprabodhinicollege.edu.in/college_library/',
                'location' => 'Shelf GEO-F1 (KOHA 910.02)',
                'total_copies' => 32,
                'issued_copies' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teaching of English in Secondary Schools: Methods and Approaches',
                'my_class_id' => $bedClassId,
                'description' => 'ELT methodologies, phonetics, and communicative language teaching',
                'author' => 'Geetha Nagaraj',
                'book_type' => 'Paperback',
                'url' => 'https://vidyaprabodhinicollege.edu.in/college_library/',
                'location' => 'Shelf ENG-G2 (KOHA 428.007)',
                'total_copies' => 28,
                'issued_copies' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gomantakiya Marathi Sahitya ani Sanskruti',
                'my_class_id' => $bedClassId,
                'description' => 'Comprehensive historical survey of Goan Marathi literature and folklore',
                'author' => 'Prof. (Dr.) Bhushan V. Bhave',
                'book_type' => 'Literary Monograph',
                'url' => 'https://vidyaprabodhinicollege.edu.in/college_library/',
                'location' => 'Shelf MAR-H1 (KOHA 891.46)',
                'total_copies' => 40,
                'issued_copies' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Digital & Periodicals
            [
                'name' => 'Prabodhan Journal of Applied Research in Commerce, Management & Education',
                'my_class_id' => null,
                'description' => 'Official peer-reviewed institutional research journal (ISSN: 2581-7671)',
                'author' => 'Prabodhan Education Society',
                'book_type' => 'Institutional Journal (Quarterly)',
                'url' => 'https://vidyaprabodhinicollege.edu.in/',
                'location' => 'Periodical Display Rack P-1',
                'total_copies' => 20,
                'issued_copies' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sarvottam: College Annual Miscellany',
                'my_class_id' => null,
                'description' => 'Annual student and faculty magazine documenting achievements, articles and art',
                'author' => 'Sarvottam Editorial Board',
                'book_type' => 'Annual Magazine',
                'url' => 'https://vidyaprabodhinicollege.edu.in/wp-content/uploads/2026/03/Sarvottam-Vidhyaprabhodini-School-Porvorim-Fina-1.pdf',
                'location' => 'Archival Section A-1',
                'total_copies' => 100,
                'issued_copies' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('books')->insert($books);
    }
}
