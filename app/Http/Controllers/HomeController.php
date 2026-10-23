<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = 'KursusKu';

        $featured = [
            [
                'code' => 'WEB-01',
                'name' => 'Web Dasar Pengujian',
                'description' => 'Belajar struktur HTML dan CSS dasar.'
            ],
            [
                'code' => 'PHP-01',
                'name' => 'PHP Dasar',
                'description' => 'Belajar variabel, function, form, dan logika PHP.'
            ],
            [
                'code' => 'LAR-01',
                'name' => 'Laravel Fundamental',
                'description' => 'Belajar route, controller, Blade, dan MVC.'
            ],
            [
                'code' => 'UI-01',
                'name' => 'UI Web Dasar',
                'description' => 'Belajar prinsip tampilan web yang rapi.'
            ],
            [
                'code' => 'DB-01',
                'name' => 'Database Dasar',
                'description' => 'Belajar dasar pengelolaan basis data.'
            ],
        ];

        return view('home', compact('siteName', 'featured'));
    }
}
