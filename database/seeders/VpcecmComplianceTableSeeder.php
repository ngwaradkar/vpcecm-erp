<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VpcecmComplianceTableSeeder extends Seeder
{
    /**
     * Seeds VPCCECM Governance, Committees, MoUs, Extension Logs, and Rankers
     */
    public function run()
    {
        DB::table('governance_committees')->delete();
        DB::table('institutional_mous')->delete();
        DB::table('extension_activities')->delete();
        DB::table('rankers_placements')->delete();

        // 1. Governance Committees
        $committees = [
            // Governing Council (Prabodhan Education Society)
            ['board_name' => 'Governing Council (PES)', 'member_name' => 'Shri. Sanjay P. Walavalkar', 'designation' => 'Chairman', 'affiliation' => 'Chairman, Prabodhan Education Society, Porvorim-Goa'],
            ['board_name' => 'Governing Council (PES)', 'member_name' => 'Shri. Rajendra L. Bhobe', 'designation' => 'Secretary', 'affiliation' => 'Secretary, Prabodhan Education Society, Porvorim-Goa'],
            ['board_name' => 'Governing Council (PES)', 'member_name' => 'Shri. Vithal (Avdhut) G. P. Parrikar', 'designation' => 'Treasurer', 'affiliation' => 'Treasurer, Prabodhan Education Society, Porvorim-Goa'],
            ['board_name' => 'Governing Council (PES)', 'member_name' => 'Shri. Sripad K. Patnekar', 'designation' => 'Member', 'affiliation' => 'Member, Prabodhan Education Society'],
            ['board_name' => 'Governing Council (PES)', 'member_name' => 'Shri. Datta B. Naik', 'designation' => 'Member', 'affiliation' => 'Educationist & Member, Prabodhan Education Society'],
            ['board_name' => 'Governing Council (PES)', 'member_name' => 'Shri. Guruprasad R. Pawaskar', 'designation' => 'Member', 'affiliation' => 'Member, Prabodhan Education Society'],
            ['board_name' => 'Governing Council (PES)', 'member_name' => 'Shri. Ulhas G. Asnodkar', 'designation' => 'Member', 'affiliation' => 'Member, Prabodhan Education Society'],
            ['board_name' => 'Governing Council (PES)', 'member_name' => 'Shri. Suresh B. Borkar', 'designation' => 'Member', 'affiliation' => 'Member, Prabodhan Education Society'],

            // College Advisory Committee
            ['board_name' => 'College Advisory Committee', 'member_name' => 'Shri. Sanjay P. Walavalkar', 'designation' => 'Chairman', 'affiliation' => 'Chairman, Prabodhan Education Society'],
            ['board_name' => 'College Advisory Committee', 'member_name' => 'Dr. Harif Kahapuri', 'designation' => 'Member', 'affiliation' => 'Associate Professor of Financial Services, Goa Business School, Goa University'],
            ['board_name' => 'College Advisory Committee', 'member_name' => 'Dr. Kameshwari Moorty', 'designation' => 'Member', 'affiliation' => 'Regional Director, IGNOU Regional Centre, Goa'],
            ['board_name' => 'College Advisory Committee', 'member_name' => 'Shri. Raghav Shetty', 'designation' => 'Member', 'affiliation' => 'Renowned Businessman'],
            ['board_name' => 'College Advisory Committee', 'member_name' => 'Adv. Narendra Sawaikar', 'designation' => 'Member', 'affiliation' => 'Chairperson, Goa Bagaytdar Sahakari Kharedi Vikri Saunstha Maryadit'],
            ['board_name' => 'College Advisory Committee', 'member_name' => 'Shri. Sanjay Y. Amonkar', 'designation' => 'Member', 'affiliation' => 'Director General, Goa Chamber of Commerce & Industry (GCCI)'],
            ['board_name' => 'College Advisory Committee', 'member_name' => 'Shri. Rajeev Kumar', 'designation' => 'Member', 'affiliation' => 'Renowned Industrialist'],
            ['board_name' => 'College Advisory Committee', 'member_name' => 'Shri. Vishant Pankar', 'designation' => 'Member', 'affiliation' => 'Renowned Businessman'],
            ['board_name' => 'College Advisory Committee', 'member_name' => 'Dr. Jagdish Kakodkar', 'designation' => 'Member', 'affiliation' => 'Renowned Medical Practitioner'],
            ['board_name' => 'College Advisory Committee', 'member_name' => 'Adv. Praveen Phaldessai', 'designation' => 'Member', 'affiliation' => 'Renowned Advocate'],
            ['board_name' => 'College Advisory Committee', 'member_name' => 'Prof. (Dr.) Bhushan V. Bhave', 'designation' => 'Ex-Officio Secretary', 'affiliation' => 'Principal, Vidya Prabodhini College'],

            // Local Managing Committee (LMC)
            ['board_name' => 'Local Managing Committee (LMC)', 'member_name' => 'Shri. Sanjay P. Walavalkar', 'designation' => 'Chairman', 'affiliation' => 'Chairman, Prabodhan Education Society'],
            ['board_name' => 'Local Managing Committee (LMC)', 'member_name' => 'Prof. Rajendra Khumbharjuvekar', 'designation' => 'Member', 'affiliation' => 'Professor & Former Member, Executive Council, Goa University'],
            ['board_name' => 'Local Managing Committee (LMC)', 'member_name' => 'Dr. Allen Abreu', 'designation' => 'Member', 'affiliation' => 'Principal, St. Joseph Vaz Institute of Education, Cortalim'],
            ['board_name' => 'Local Managing Committee (LMC)', 'member_name' => 'Dr. Anil T. Thosare', 'designation' => 'Member', 'affiliation' => 'Associate Professor & HoD B.A.B.Ed., VPCCECM'],
            ['board_name' => 'Local Managing Committee (LMC)', 'member_name' => 'Dr. Ujvala M. Hanjunkar', 'designation' => 'Member', 'affiliation' => 'Vice-Principal / HoD Commerce, VPCCECM'],
            ['board_name' => 'Local Managing Committee (LMC)', 'member_name' => 'Shri. Rudresh U. Mhamal', 'designation' => 'Member', 'affiliation' => 'Assistant Professor in Commerce, VPCCECM'],
            ['board_name' => 'Local Managing Committee (LMC)', 'member_name' => 'Dr. Sunny S. Pandhre', 'designation' => 'Member', 'affiliation' => 'Assistant Professor in Commerce, VPCCECM'],
            ['board_name' => 'Local Managing Committee (LMC)', 'member_name' => 'Shri. Rajaram S. Sandye', 'designation' => 'Member', 'affiliation' => 'Head Clerk (Non-Teaching Representative), VPCCECM'],
            ['board_name' => 'Local Managing Committee (LMC)', 'member_name' => 'Prof. (Dr.) Bhushan V. Bhave', 'designation' => 'Ex-Officio Secretary', 'affiliation' => 'Principal, VPCCECM'],

            // Industry Academic Interface (IAI)
            ['board_name' => 'Industry Academic Interface (IAI)', 'member_name' => 'Prof. (Dr.) Bhushan V. Bhave', 'designation' => 'Principal / Chairman', 'affiliation' => 'Principal, VPCCECM'],
            ['board_name' => 'Industry Academic Interface (IAI)', 'member_name' => 'Shri. Nitin Kunkolienker', 'designation' => 'Member', 'affiliation' => 'Vice-President, AshRon Technologies'],
            ['board_name' => 'Industry Academic Interface (IAI)', 'member_name' => 'Dr. Purushottam R. Pednekar', 'designation' => 'Member', 'affiliation' => 'Chairman, State Level E.I.A. Authority, Goa'],
            ['board_name' => 'Industry Academic Interface (IAI)', 'member_name' => 'Shri. Sanjay Y. Amonkar', 'designation' => 'Member', 'affiliation' => 'Director General, Goa Chamber of Commerce & Industry'],
            ['board_name' => 'Industry Academic Interface (IAI)', 'member_name' => 'Shri. Utpal Parrikar', 'designation' => 'Member', 'affiliation' => 'Industrialist and Social Worker'],
            ['board_name' => 'Industry Academic Interface (IAI)', 'member_name' => 'Smt. Shashi Soni', 'designation' => 'Member', 'affiliation' => 'Chairperson, IZMO Limited'],
            ['board_name' => 'Industry Academic Interface (IAI)', 'member_name' => 'Dr. Radhika Nayak', 'designation' => 'Member', 'affiliation' => 'Former Principal, S.S. Dempo College of Commerce & Economics'],
            ['board_name' => 'Industry Academic Interface (IAI)', 'member_name' => 'Shri. Rama Malwankar', 'designation' => 'Member', 'affiliation' => 'Senior Human Resource Manager, UNICHEM'],
            ['board_name' => 'Industry Academic Interface (IAI)', 'member_name' => 'Shri. Girish Bharne', 'designation' => 'Member', 'affiliation' => 'Co-founder, Divija Naturals'],
            ['board_name' => 'Industry Academic Interface (IAI)', 'member_name' => 'Shri. Sanjeev Joglekar', 'designation' => 'Member', 'affiliation' => 'Senior Environmental Engineer, Goa State Pollution Control Board'],
            ['board_name' => 'Industry Academic Interface (IAI)', 'member_name' => 'Shri. Vishwambhar Vengurlekar', 'designation' => 'Member', 'affiliation' => 'Representative, NKGSB Co-operative Bank Ltd.'],
        ];

        DB::table('governance_committees')->insert(array_map(function($i) {
            $i['created_at'] = now();
            $i['updated_at'] = now();
            return $i;
        }, $committees));

        // 2. MoUs
        $mous = [
            ['partner_name' => 'Putzmeister Concrete Machines Pvt. Ltd., Verna, Goa', 'date_signed' => 'January 7, 2025', 'validity' => 'Active', 'scope' => 'Corporate Social Responsibility (CSR) Employee Volunteer Program (EVP); industry resource persons for student employability certification.'],
            ['partner_name' => 'Department of Archives, Government of Goa', 'date_signed' => 'September 26, 2023', 'validity' => 'Active', 'scope' => 'Joint historical research, student internships/excursions, translating and publishing archival records.'],
            ['partner_name' => 'Gokhale Education Society\'s College of Education & Research, Parel, Mumbai', 'date_signed' => 'July 19, 2023', 'validity' => '3-Year Validity', 'scope' => 'Curriculum quality enhancement, resource sharing, faculty and student exchange, and joint pedagogical research.'],
            ['partner_name' => 'Laxmibai Sitaram Halbe College, Dodamarg, Maharashtra', 'date_signed' => 'September 7, 2023', 'validity' => 'Extendable', 'scope' => 'Faculty and student exchange, add-on skill courses, joint seminars, online quizzes, and community outreach.'],
            ['partner_name' => 'St. Xavier\'s College, Mapusa, Goa', 'date_signed' => 'October 19, 2022', 'validity' => 'Active', 'scope' => 'Promotion of Konkani language and literature via joint seminars, workshops, and literary research.'],
            ['partner_name' => 'Jan Shikshan Sansthan, Goa', 'date_signed' => 'November 2021', 'validity' => 'Active', 'scope' => 'Vocational skill courses: Room Attendant, Basics of Beautician, and Electrician.'],
            ['partner_name' => 'Akhiviraj Guest House, Porvorim, Goa', 'date_signed' => 'September 30, 2021', 'validity' => 'Renewable', 'scope' => 'Safe, hygienic, and peaceful hostel/guest-house accommodation for outstation college students.'],
            ['partner_name' => 'Bombay Stock Exchange (BSE Institute Ltd. & PARC, Mumbai)', 'date_signed' => '2022', 'validity' => 'Active Linkage', 'scope' => 'Capital market guest lectures and Certificate Course in Indian Financial Market & Financial Service.'],
            ['partner_name' => 'The Goa State Biodiversity Board (GSBB), Govt. of Goa', 'date_signed' => '2021', 'validity' => 'Active Linkage', 'scope' => 'Biodiversity documentation, environmental conservation awareness, and sustainable development projects.'],
            ['partner_name' => 'Dhavrukh (Mandrem, Pernem-Goa)', 'date_signed' => '2021', 'validity' => 'Active Linkage', 'scope' => 'Tree plantation drives, forest conservation, sapling distribution, rainwater harvesting, water body cleanup.'],
            ['partner_name' => 'Mahatma Gandhi Antarrashtriya Hindi Vishwavidyalaya, Wardha', 'date_signed' => '2022', 'validity' => 'Active Linkage', 'scope' => 'Collaborative certificate courses and joint academic programs promoting Hindi language and literature.'],
            ['partner_name' => 'Mahavir Mahavidyalaya, Kolhapur, Maharashtra', 'date_signed' => '2022', 'validity' => 'Active Linkage', 'scope' => 'Joint research publications, teaching-learning enhancement, and infrastructure resource sharing.'],
            ['partner_name' => 'Vishwasrao Naik Arts, Commerce & Baba Naik Science Mahavidyalaya, Shirala', 'date_signed' => '2022', 'validity' => 'Active Linkage', 'scope' => 'Inter-state academic and co-curricular collaboration.'],
            ['partner_name' => 'Secondary High Schools Across Goa (Shri Nirakar, Shree Balram, Shri Shraddhanand)', 'date_signed' => '2015', 'validity' => 'Active Permanent', 'scope' => 'Practice teaching, school internships, and community education outreach for 4-year B.A.B.Ed.'],
        ];

        DB::table('institutional_mous')->insert(array_map(function($i) {
            $i['created_at'] = now();
            $i['updated_at'] = now();
            return $i;
        }, $mous));

        // 3. Extension Activities
        $activities = [
            ['activity_title' => 'NSS Day Installation & Felicitation of National Campers', 'resource_person' => 'Shri. Subhash Naik (Journalist)', 'venue' => 'Vidya Prabodhini College Campus', 'category' => 'NSS'],
            ['activity_title' => '\'Mission Rabies\' Awareness Talk on World Rabies Day', 'resource_person' => 'Dr. Murugum Appupillai', 'venue' => 'College Stilt Multipurpose Area', 'category' => 'NSS'],
            ['activity_title' => 'Poshan Maha: Talk on Healthy Eating', 'resource_person' => 'Asst. Prof. Dr. Shailesh G. Chodankar', 'venue' => 'Online via Google Meet', 'category' => 'Health & NSS'],
            ['activity_title' => 'Gandhi Jayanti Celebration & FIT India Freedom Run 2.0', 'resource_person' => 'NSS Programme Officers', 'venue' => 'Jan Shikshan Sansthan (College Campus)', 'category' => 'NSS'],
            ['activity_title' => 'Vigilance Awareness Week (Central Vigilance Commission Pledge)', 'resource_person' => 'NSS Volunteers & Faculty', 'venue' => 'College Campus', 'category' => 'National Observance'],
            ['activity_title' => 'New Voter Registration Awareness Programme & Drive', 'resource_person' => 'Electoral Literacy Officers', 'venue' => 'District Electoral Registration Office (09 Porvorim)', 'category' => 'Civic Outreach'],
            ['activity_title' => 'National Youth Parliament – Parliament Conclave Goa @60', 'resource_person' => 'State Youth Parliament Dignitaries', 'venue' => 'Dr. Shyama Prasad Mukherjee Stadium', 'category' => 'Youth Leadership'],
            ['activity_title' => 'Educational Talk on \'Blood Donation: The Gift of Life\'', 'resource_person' => 'Dr. Uma Sadekar', 'venue' => 'F.Y.B.Com. Classroom', 'category' => 'Red Ribbon Club'],
            ['activity_title' => 'HIV/AIDS & Blood Donation Awareness Rally', 'resource_person' => 'NSS & RRC Volunteers', 'venue' => 'Porvorim Neighborhood', 'category' => 'Community Outreach'],
            ['activity_title' => 'Annual Blood Donation Camp', 'resource_person' => 'Medical Officers, GMC Blood Bank', 'venue' => 'Auditorium Hall', 'category' => 'Health Outreach'],
            ['activity_title' => 'World AIDS Day: \'AIDS Awareness Pledge by Youth of Goa\'', 'resource_person' => 'Shri. P. S. Sreedharan Pillai (Hon\'ble Governor of Goa)', 'venue' => 'State Hall & College Campus', 'category' => 'State Event'],
            ['activity_title' => 'Armed Forces Flag Day Fund Contribution Drive', 'resource_person' => 'NSS Unit Volunteers', 'venue' => 'Campus & Community', 'category' => 'National Service'],
            ['activity_title' => 'EVM & VVPAT Hands-On Awareness Camp', 'resource_person' => 'Officials of District Electoral Office', 'venue' => 'College Campus', 'category' => 'Civic Outreach'],
            ['activity_title' => '\'Goa Utsav\' Lecture Series (Celebrating Goa @60)', 'resource_person' => 'Prof. Datta B. Naik (Educationist)', 'venue' => 'EDC Hall, Panaji', 'category' => 'Cultural Heritage'],
            ['activity_title' => 'Launch of \'Pink Force\' (Women Squad of Goa Police)', 'resource_person' => 'Goa Police Leadership', 'venue' => 'Miramar Circle, Panaji', 'category' => 'Women Empowerment'],
            ['activity_title' => 'Azadi Ka Amrut Mahotsav – Clean India Program', 'resource_person' => 'NSS Volunteers', 'venue' => 'Porvorim & Saligao Panchayats', 'category' => 'Swachh Bharat'],
            ['activity_title' => 'National Youth Day Talk (\'Lessons from Swami Vivekananda\')', 'resource_person' => 'Shri. Rajendra L. Bhobe (Secretary, PES)', 'venue' => 'Swami Vivekanand Hall', 'category' => 'Cultural'],
            ['activity_title' => '\'75 Crore Suryanamaskar\' Independence Tribute', 'resource_person' => 'Physical Education Faculty', 'venue' => 'Sports Ground & Online', 'category' => 'Yoga & Fitness'],
            ['activity_title' => 'International Women\'s Day & Women\'s Health Series', 'resource_person' => 'Dr. Radhika Nayak & Dr. Vikas Naik', 'venue' => 'Women\'s Cell & Medical Centre', 'category' => 'Women\'s Cell'],
            ['activity_title' => 'Konkani Sahitya Sammelan', 'resource_person' => 'State Literary Dignitaries & Principal', 'venue' => 'Vidya Prabodhini College, Parvari', 'category' => 'Literary'],
            ['activity_title' => 'World Earth Day: Rainwater Harvesting Talk', 'resource_person' => 'Shri. Kaushal Parsekar (Dhavrukh)', 'venue' => 'Mandrem / Campus', 'category' => 'Environment'],
        ];

        DB::table('extension_activities')->insert(array_map(function($i) {
            $i['created_at'] = now();
            $i['updated_at'] = now();
            return $i;
        }, $activities));

        // 4. Rankers & Placements
        $rankers = [
            ['record_type' => 'Academic Ranker', 'name' => 'Mr. Naushad Arleshwar', 'programme' => 'Fourth Year B.A.B.Ed.', 'year_cohort' => '2018–2019', 'achievement' => 'Secured First Rank with 87.00%', 'organization' => 'Goa University'],
            ['record_type' => 'Academic Ranker', 'name' => 'Ms. Suvidhya Naik', 'programme' => 'Fourth Year B.A.B.Ed.', 'year_cohort' => '2021–2022', 'achievement' => 'Secured First Rank with 85.90%', 'organization' => 'Goa University'],
            ['record_type' => 'Academic Ranker', 'name' => 'Ms. Gayatri Kamat', 'programme' => 'Third Year B.Com.', 'year_cohort' => '2021–2022', 'achievement' => 'Secured First Rank with 85.58%', 'organization' => 'Goa University'],
            ['record_type' => 'Academic Ranker', 'name' => 'Ms. Vaishnavi Kamat', 'programme' => 'Third Year B.Com.', 'year_cohort' => '2020–2021', 'achievement' => 'Secured First Rank with 85.58%', 'organization' => 'Goa University'],
            ['record_type' => 'Academic Ranker', 'name' => 'Ms. Rushali Shirodkar', 'programme' => 'Fourth Year B.A.B.Ed.', 'year_cohort' => '2020–2021', 'achievement' => 'Secured First Rank with 84.40%', 'organization' => 'Goa University'],
            ['record_type' => 'Academic Ranker', 'name' => 'Miss. Akankshya Naik', 'programme' => 'Fourth Year B.A.B.Ed.', 'year_cohort' => '2019–2020', 'achievement' => 'Secured First Rank with 83.83%', 'organization' => 'Goa University'],
            ['record_type' => 'Academic Ranker', 'name' => 'Ms. Prajakta Gaonkar', 'programme' => 'Fourth Year B.A.B.Ed.', 'year_cohort' => '2022–2023', 'achievement' => 'Secured First Rank with 81.57%', 'organization' => 'Goa University'],
            ['record_type' => 'Academic Ranker', 'name' => 'Miss. Deepali Satpute', 'programme' => 'Third Year B.Com.', 'year_cohort' => '2019–2020', 'achievement' => 'Secured First Rank with 81.50%', 'organization' => 'Goa University'],
            ['record_type' => 'Academic Ranker', 'name' => 'Ms. Nisha Narvekar', 'programme' => 'Third Year B.Com.', 'year_cohort' => '2022–2023', 'achievement' => 'Secured First Rank with 79.00%', 'organization' => 'Goa University'],
            ['record_type' => 'Academic Ranker', 'name' => 'Ms. Anishka Palekar', 'programme' => 'Third Year B.Com.', 'year_cohort' => '2018–2019', 'achievement' => 'Secured First Rank with 77.30%', 'organization' => 'Goa University'],

            ['record_type' => 'Sports Laurel', 'name' => 'Mr. Vishnu Meena', 'programme' => 'College Athletics Team', 'year_cohort' => '2019–2022', 'achievement' => 'Participated in 56th National Cross Country Championship (Kohima); 3rd Place Goa State Championship; Best Sports Person for 3 consecutive years', 'organization' => 'Sports Authority of Goa'],
            ['record_type' => 'Sports Laurel', 'name' => 'Mr. Pritam Damanal', 'programme' => 'Tennis Ball Cricket Team', 'year_cohort' => '2021–2022', 'achievement' => 'Indo-Nepal Inter-State International Championship', 'organization' => 'Nepal Tennis Ball Cricket Association'],
            ['record_type' => 'Sports Laurel', 'name' => 'Mr. Nikhil Kubal', 'programme' => 'Tennis Ball Cricket Team', 'year_cohort' => '2021–2022', 'achievement' => 'Indo-Nepal Inter-State International Championship', 'organization' => 'Nepal Tennis Ball Cricket Association'],
            ['record_type' => 'Sports Laurel', 'name' => 'Miss Snehal Naik', 'programme' => 'F.Y.B.A.B.Ed. (Chess)', 'year_cohort' => '2020–2021', 'achievement' => 'Best Women Prize at 1st All Goa State Senior Online Chess Championship; 4th in Junior Championship', 'organization' => 'Goa Chess Association'],

            ['record_type' => 'Placement', 'name' => 'Graduating B.Com. Cohort', 'programme' => 'B.Com.', 'year_cohort' => '2022–2024', 'achievement' => 'Selected for Executive & Banking Roles', 'organization' => 'TJSB Sahakari Bank Ltd.'],
            ['record_type' => 'Placement', 'name' => 'Graduating B.Com. Cohort', 'programme' => 'B.Com.', 'year_cohort' => '2022–2024', 'achievement' => 'Selected for Corporate Banking Operations', 'organization' => 'YES Bank Ltd.'],
            ['record_type' => 'Placement', 'name' => 'Graduating B.Com. Cohort', 'programme' => 'B.Com.', 'year_cohort' => '2022–2024', 'achievement' => 'Selected for Retail & Operations Management', 'organization' => 'Wellness Forever'],
        ];

        DB::table('rankers_placements')->insert(array_map(function($i) {
            $i['created_at'] = now();
            $i['updated_at'] = now();
            return $i;
        }, $rankers));
    }
}
