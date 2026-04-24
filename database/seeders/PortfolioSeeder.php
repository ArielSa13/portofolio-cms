<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\ContactSetting;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        About::query()->updateOrCreate(['id' => 1], [
            'name' => 'Nama Anda',
            'headline' => 'Web developer yang fokus membangun aplikasi yang rapi, terstruktur, dan siap digunakan di dunia kerja.',
            'short_bio' => 'Saya berfokus pada pengembangan aplikasi web dengan Laravel, database yang terstruktur, dan implementasi yang mudah dipelihara.',
            'full_bio' => 'Portfolio ini digunakan untuk menampilkan project, skill, dan pengalaman yang relevan untuk mencari peluang kerja sebagai web developer. Setiap bagian dirancang agar recruiter dapat memahami kemampuan teknis, cara berpikir, dan kualitas implementasi saya dengan lebih cepat.',
            'email' => 'hello@example.com',
            'whatsapp' => '+62 812 0000 0000',
            'location' => 'Indonesia',
        ]);

        ContactSetting::query()->updateOrCreate(['id' => 1], [
            'email' => 'hello@example.com',
            'whatsapp' => '+62 812 0000 0000',
            'linkedin' => 'linkedin.com/in/username',
            'instagram' => 'instagram.com/username',
            'github' => 'github.com/username',
            'cta_text' => 'Saat ini saya terbuka untuk peluang kerja sebagai web developer, internship, freelance, maupun kolaborasi teknis yang relevan.',
        ]);

        foreach ([
            ['title' => 'Laravel Portfolio CMS', 'description' => 'CMS portofolio berbasis Laravel untuk mengelola project, profil, dan konten personal secara terstruktur.', 'category' => 'Web Development'],
            ['title' => 'Task Management App', 'description' => 'Aplikasi manajemen tugas dengan autentikasi, CRUD, dan struktur database yang jelas.', 'category' => 'Application Development'],
        ] as $item) {
            Project::query()->updateOrCreate(['slug' => Str::slug($item['title'])], [
                'title' => $item['title'],
                'description' => $item['description'],
                'content' => 'Project ini dibangun untuk menunjukkan pendekatan saya dalam menyusun fitur, membuat struktur data, dan mengimplementasikan aplikasi web dengan Laravel secara rapi dan mudah dikembangkan.',
                'category' => $item['category'],
                'tech_stack' => 'Laravel, Tailwind CSS, Blade, MySQL',
                'is_featured' => true,
                'status' => 'published',
                'published_at' => now(),
            ]);
        }

        foreach ([
            ['title' => 'Backend Development', 'description' => 'Membangun logika aplikasi, CRUD, validasi, autentikasi, dan struktur backend menggunakan Laravel.'],
            ['title' => 'Database Design', 'description' => 'Menyusun relasi data dan struktur database yang rapi agar aplikasi lebih mudah dikembangkan.'],
            ['title' => 'Web Application Structure', 'description' => 'Menata alur halaman, controller, model, dan view agar aplikasi tetap jelas dan maintainable.'],
        ] as $service) {
            Service::query()->updateOrCreate(['title' => $service['title']], $service);
        }

        foreach ([
            ['name' => 'Laravel'], ['name' => 'PHP'], ['name' => 'Blade'], ['name' => 'Tailwind CSS'], ['name' => 'MySQL'], ['name' => 'Git'], ['name' => 'GitHub']
        ] as $skill) {
            Skill::query()->updateOrCreate(['name' => $skill['name']], $skill);
        }

        Testimonial::query()->updateOrCreate(['name' => 'Colleague Sample'], [
            'role' => 'Team Lead',
            'company' => 'Sample Company',
            'message' => 'Mampu menyusun aplikasi dengan struktur yang rapi, mudah dipahami, dan komunikatif saat mengerjakan fitur.',
        ]);
    }
}
