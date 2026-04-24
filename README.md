# Laravel Portfolio CMS Starter

Starter CMS portofolio personal branding dengan backend Laravel dan frontend Blade + Tailwind CDN.

## Fitur
- Login admin (siap dihubungkan ke Laravel Breeze)
- Dashboard admin
- CRUD Projects
- Kelola About, Services, Experience, Testimonials, Skills, Contact settings
- Halaman publik: Home, About, Projects, Contact
- Struktur rapi untuk dikembangkan lebih lanjut

## Stack
- Laravel 11+
- Blade
- MySQL
- Tailwind CSS (CDN untuk starter)

## Cara pakai
1. Buat project Laravel baru:
   ```bash
   composer create-project laravel/laravel portfolio-cms
   ```
2. Salin isi starter ini ke dalam project Laravel Anda.
3. Install auth:
   ```bash
   composer require laravel/breeze --dev
   php artisan breeze:install blade
   npm install
   npm run build
   ```
4. Atur `.env` database.
5. Jalankan migration:
   ```bash
   php artisan migrate
   ```
6. Buat user admin:
   ```bash
   php artisan make:seeder AdminUserSeeder
   ```
7. Jalankan server:
   ```bash
   php artisan serve
   ```

## Catatan
- Ini adalah starter code yang siap dikembangkan, bukan bundle vendor penuh.
- Upload gambar memakai `public/uploads` untuk awal; idealnya pindah ke Laravel Storage.
- Untuk editor rich text, tambahkan Tiptap/CKEditor sesuai kebutuhan.

## Route utama
- `/` home
- `/about`
- `/projects`
- `/projects/{slug}`
- `/contact`
- `/admin` dashboard
- `/admin/projects` CRUD project

## Pengembangan lanjutan
- Tambah SEO meta per halaman
- Integrasi analytics
- Contact form email
- Dark mode toggle
- Blog system
- API / Inertia / React upgrade
