@extends('public.layout')

@php
    use Carbon\Carbon;

    $photoPath = $about->photo ?? null;

    if ($photoPath) {
        if (\Illuminate\Support\Str::startsWith($photoPath, ['http://', 'https://'])) {
            $photoUrl = $photoPath;
        } elseif (\Illuminate\Support\Str::startsWith($photoPath, ['storage/', 'images/', 'uploads/'])) {
            $photoUrl = asset($photoPath);
        } else {
            $photoUrl = asset('storage/' . ltrim($photoPath, '/'));
        }
    } else {
        $photoUrl = null;
    }
@endphp

@section('title', 'About | Portfolio')

@section('content')
<section class="mx-auto max-w-7xl px-6 py-16 lg:px-8 lg:py-20">
    <div class="grid gap-8 lg:grid-cols-[1.08fr_0.92fr] lg:items-start">

        {{-- LEFT --}}
        <div class="max-w-3xl">
            <span class="inline-flex rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs font-semibold uppercase tracking-[0.35em] text-slate-300">
                About
            </span>

            <div class="mt-6 flex flex-col gap-5 sm:flex-row sm:items-center">
                @if ($photoUrl)
                    <div class="shrink-0">
                        <img
                            src="{{ $photoUrl }}"
                            alt="{{ $about->name ?? 'Profile Photo' }}"
                            class="h-28 w-28 rounded-[1.5rem] border border-white/10 object-cover shadow-xl sm:h-32 sm:w-32"
                        >
                    </div>
                @endif

                <div>
                    <h1 class="text-5xl font-semibold tracking-tight text-white lg:text-6xl">
                        {{ $about->name ?? 'Muhamad Ariel Saputra' }}
                    </h1>

                    <p class="mt-4 max-w-2xl text-xl leading-8 text-slate-300">
                        {{ $about->headline ?? 'IT Support & Web Developer yang berfokus pada pengelolaan sistem, jaringan, dan pengembangan aplikasi berbasis Laravel.' }}
                    </p>
                </div>
            </div>

            <div class="mt-8 max-w-2xl space-y-5 text-base leading-8 text-slate-400">
                @php
                    $bio = $about->full_bio ?? $about->short_bio ?? null;
                @endphp

                @if ($bio)
                    @foreach (preg_split("/\r\n|\n|\r/", trim($bio)) as $paragraph)
                        @if (trim($paragraph) !== '')
                            <p>{{ $paragraph }}</p>
                        @endif
                    @endforeach
                @else
                    <p>
                        Saya memiliki pengalaman dalam IT Support dan Web Development, terbiasa menangani troubleshooting hardware, software, serta jaringan LAN/WAN.
                    </p>
                    <p>
                        Selain itu, saya juga berpengalaman dalam membangun dan melakukan deployment aplikasi web menggunakan Laravel di lingkungan server Linux.
                    </p>
                    <p>
                        Saat ini saya terbuka untuk peluang kerja di bidang IT Support maupun Web Development, dan siap berkontribusi dengan pendekatan yang terstruktur dan problem-solving oriented.
                    </p>
                @endif
            </div>

            <div class="mt-10 grid gap-4 sm:grid-cols-2 sm:max-w-2xl">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Email</p>
                    <p class="mt-3 break-all text-sm text-white sm:text-base">
                        {{ $about->email ?? 'muhamadarielsaputra11@gmail.com' }}
                    </p>
                </div>

                <div class="rounded-3xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Location</p>
                    <p class="mt-3 text-sm text-white sm:text-base">
                        {{ $about->location ?? 'Indonesia' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- RIGHT CARD --}}
        <div class="lg:sticky lg:top-24">
            <div class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 p-5 shadow-xl backdrop-blur">
                <div class="rounded-[1.75rem] border border-white/10 bg-[radial-gradient(circle_at_top_left,rgba(34,211,238,0.16),transparent_28%),linear-gradient(135deg,#111827,#020617,#0f172a)] p-7">
                    <p class="text-xs uppercase tracking-[0.35em] text-slate-500">
                        Professional Profile
                    </p>

                    <h2 class="mt-4 max-w-md text-3xl font-semibold leading-tight text-white">
                        Berfokus pada troubleshooting sistem, pengelolaan jaringan, dan pengembangan aplikasi yang terstruktur.
                    </h2>

                    <p class="mt-5 max-w-md leading-8 text-slate-300">
                        Memiliki pengalaman di sisi support, jaringan, dan development untuk membantu kebutuhan operasional berjalan lebih stabil dan efisien.
                    </p>

                    <div class="mt-8 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                            <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Experience</p>
                            <p class="mt-2 text-3xl font-semibold text-white">
                                {{ $experiences->count() }}
                            </p>
                        </div>

                        <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                            <p class="text-xs uppercase tracking-[0.25em] text-slate-500">Skills</p>
                            <p class="mt-2 text-3xl font-semibold text-white">
                                {{ $skills->count() }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-wrap gap-2 text-xs uppercase tracking-[0.25em] text-slate-400">
                        <span class="rounded-full border border-white/10 px-3 py-2">IT Support</span>
                        <span class="rounded-full border border-white/10 px-3 py-2">Laravel</span>
                        <span class="rounded-full border border-white/10 px-3 py-2">Linux Server</span>
                        <span class="rounded-full border border-white/10 px-3 py-2">Networking</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="mx-auto max-w-7xl px-6 pb-20 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-[1fr_0.92fr]">

        {{-- EXPERIENCE --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">
                Experience
            </p>

            <div class="mt-6 space-y-5">
                @forelse ($experiences as $experience)
                    @php
                        $startDate = $experience->start_date ? Carbon::parse($experience->start_date)->format('M Y') : null;
                        $endDate = $experience->end_date ? Carbon::parse($experience->end_date)->format('M Y') : null;
                    @endphp

                    <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
                        <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between">
                            <div class="pr-4">
                                <h3 class="text-2xl font-semibold text-white">
                                    {{ $experience->position }}
                                </h3>

                                <p class="mt-2 text-sm uppercase tracking-[0.25em] text-slate-500">
                                    {{ $experience->company }}
                                </p>
                            </div>

                            <p class="shrink-0 text-sm text-slate-400">
                                {{ $startDate ?? '-' }}{{ $endDate ? ' — '.$endDate : ' — Present' }}
                            </p>
                        </div>

                        <p class="mt-5 max-w-3xl leading-8 text-slate-300">
                            {{ $experience->description }}
                        </p>
                    </div>
                @empty
                    <div class="rounded-[2rem] border border-dashed border-white/15 p-6 text-slate-400">
                        Tambahkan pengalaman kerja dari CMS.
                    </div>
                @endforelse
            </div>
        </div>

        {{-- SKILLS + APPROACH --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">
                Skills
            </p>

            <div class="mt-6 rounded-[2rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
                <div class="flex flex-wrap gap-3">
                    @forelse ($skills as $skill)
                        <span class="rounded-full border border-white/10 bg-slate-950/60 px-4 py-2 text-sm text-slate-200">
                            {{ $skill->name }}
                        </span>
                    @empty
                        <p class="text-slate-400">Tambahkan skills dari CMS.</p>
                    @endforelse
                </div>
            </div>

            <div class="mt-6 rounded-[2rem] border border-white/10 bg-gradient-to-br from-white/10 to-white/5 p-6">
                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">
                    Approach
                </p>

                <h3 class="mt-4 text-2xl font-semibold text-white">
                    Structured thinking. Practical solutions. Reliable systems.
                </h3>

                <p class="mt-4 leading-8 text-slate-300">
                    Saya terbiasa menangani kebutuhan teknis dari sisi support, jaringan, hingga pengembangan aplikasi. Fokus saya adalah membuat sistem yang stabil, mudah dipahami, dan siap digunakan dalam operasional kerja.
                </p>
            </div>
        </div>

    </div>
</section>

{{-- EDUCATION + RESUME --}}
<section class="mx-auto max-w-7xl px-6 pb-20 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-[1fr_1fr]">

        {{-- EDUCATION --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">
                Education
            </p>

            <h2 class="mt-4 text-4xl font-semibold tracking-tight text-white">
                Academic background
            </h2>

            <div class="mt-8 space-y-5">
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
                    <h3 class="text-xl font-semibold text-white">
                        Universitas Pelita Bangsa
                    </h3>
                    <p class="mt-2 text-sm text-slate-400">
                        S1 Teknik Informatika • 2021 – 2025
                    </p>
                    <p class="mt-3 text-sm text-slate-300">
                        IPK: 3.52
                    </p>
                </div>

                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
                    <h3 class="text-xl font-semibold text-white">
                        SMK Al-Mufti
                    </h3>
                    <p class="mt-2 text-sm text-slate-400">
                        Teknik Komputer dan Jaringan • 2018 – 2021
                    </p>
                </div>
            </div>
        </div>

        {{-- RESUME --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">
                Resume
            </p>

            <h2 class="mt-4 text-4xl font-semibold tracking-tight text-white">
                Download CV
            </h2>

            <p class="mt-5 max-w-md leading-8 text-slate-300">
                Saya menyediakan dua versi CV yang disesuaikan dengan posisi yang dilamar, yaitu IT Support dan Web Development.
            </p>

            <div class="mt-8 space-y-5">
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
                    <h3 class="text-xl font-semibold text-white">
                        IT Support CV
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-slate-300">
                        Fokus pada troubleshooting, jaringan LAN/WAN, Mikrotik, Linux server, serta dukungan teknis untuk operasional sistem.
                    </p>

                    <a href="{{ asset('cv/cv-it-support.pdf') }}"
                       target="_blank"
                       class="mt-5 inline-flex items-center justify-center rounded-full border border-white/15 px-5 py-2.5 text-sm font-semibold text-white transition hover:border-white/30 hover:bg-white/10">
                        Download CV
                    </a>
                </div>

                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
                    <h3 class="text-xl font-semibold text-white">
                        Programmer CV
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-slate-300">
                        Fokus pada Laravel, database MySQL, integrasi API, deployment aplikasi, dan pengembangan sistem web.
                    </p>

                    <a href="{{ asset('cv/cv-programmer.pdf') }}"
                       target="_blank"
                       class="mt-5 inline-flex items-center justify-center rounded-full border border-white/15 px-5 py-2.5 text-sm font-semibold text-white transition hover:border-white/30 hover:bg-white/10">
                        Download CV
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection