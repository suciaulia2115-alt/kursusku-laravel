<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'code' => 'WEB-201',
                'name' => 'Web Modern',
                'description' => 'Mempelajari pengembangan website modern.',
                'fee' => 300000,
                'quota' => 30,
                'start_date' => '2026-12-01',
                'status' => 'open',
            ],
            [
                'code' => 'WEB-202',
                'name' => 'HTML dan CSS Lanjutan',
                'description' => 'Mempelajari HTML dan CSS tingkat lanjut.',
                'fee' => 250000,
                'quota' => 25,
                'start_date' => '2026-12-02',
                'status' => 'open',
            ],
            [
                'code' => 'PHP-201',
                'name' => 'PHP Lanjutan',
                'description' => 'Mempelajari pemrograman PHP lanjutan.',
                'fee' => 350000,
                'quota' => 30,
                'start_date' => '2026-12-03',
                'status' => 'open',
            ],
            [
                'code' => 'DB-201',
                'name' => 'MySQL Lanjutan',
                'description' => 'Mempelajari pengelolaan database MySQL.',
                'fee' => 275000,
                'quota' => 25,
                'start_date' => '2026-12-04',
                'status' => 'open',
            ],
            [
                'code' => 'UI-201',
                'name' => 'UI UX Design',
                'description' => 'Mempelajari desain antarmuka dan pengalaman pengguna.',
                'fee' => 325000,
                'quota' => 20,
                'start_date' => '2026-12-05',
                'status' => 'open',
            ],
            [
                'code' => 'LAR-201',
                'name' => 'Laravel Dasar',
                'description' => 'Mempelajari framework Laravel dari dasar.',
                'fee' => 400000,
                'quota' => 30,
                'start_date' => '2026-12-06',
                'status' => 'draft',
            ],
            [
                'code' => 'JS-201',
                'name' => 'JavaScript Dasar',
                'description' => 'Mempelajari dasar pemrograman JavaScript.',
                'fee' => 300000,
                'quota' => 25,
                'start_date' => '2026-12-07',
                'status' => 'draft',
            ],
            [
                'code' => 'PY-201',
                'name' => 'Python Dasar',
                'description' => 'Mempelajari pemrograman Python untuk pemula.',
                'fee' => 350000,
                'quota' => 25,
                'start_date' => '2026-12-08',
                'status' => 'draft',
            ],
            [
                'code' => 'DS-201',
                'name' => 'Data Science Dasar',
                'description' => 'Pengenalan analisis data dan data science.',
                'fee' => 450000,
                'quota' => 20,
                'start_date' => '2026-12-09',
                'status' => 'draft',
            ],
            [
                'code' => 'NET-201',
                'name' => 'Jaringan Komputer',
                'description' => 'Mempelajari dasar jaringan komputer.',
                'fee' => 300000,
                'quota' => 25,
                'start_date' => '2026-12-10',
                'status' => 'closed',
            ],
            [
                'code' => 'GD-201',
                'name' => 'Graphic Design',
                'description' => 'Mempelajari desain grafis digital.',
                'fee' => 275000,
                'quota' => 20,
                'start_date' => '2026-12-11',
                'status' => 'closed',
            ],
            [
                'code' => 'MOB-201',
                'name' => 'Mobile Development',
                'description' => 'Pengenalan pengembangan aplikasi mobile.',
                'fee' => 500000,
                'quota' => 20,
                'start_date' => '2026-12-12',
                'status' => 'closed',
            ],
            [
                'code' => 'SEC-201',
                'name' => 'Cyber Security Dasar',
                'description' => 'Mempelajari dasar keamanan sistem informasi.',
                'fee' => 400000,
                'quota' => 25,
                'start_date' => '2026-12-13',
                'status' => 'closed',
            ],
        ];

        foreach ($courses as $course) {
            Course::firstOrCreate(
                ['code' => $course['code']],
                $course
            );
        }
    }
}
