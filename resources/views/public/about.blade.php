@extends('public.layout')

@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;

    $photoPath = $about->photo ?? null;
    if ($photoPath) {
        if (Str::startsWith($photoPath, ['http://', 'https://'])) {
            $photoUrl = $photoPath;
        } elseif (Str::startsWith($photoPath, ['storage/', 'images/', 'uploads/'])) {
            $photoUrl = asset($photoPath);
        } else {
            $photoUrl = asset('storage/' . ltrim($photoPath, '/'));
        }
    } else {
        $photoUrl = null;
    }
@endphp

@section('title', 'About — ' . ($about->name ?? 'Portfolio'))

@section('content')

{{-- ═══════════════════════════════════════════════════
     HERO INTRO
═══════════════════════════════════════════════════ --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-12">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-xs text-slate-600 mb-12">
        <a href="{{ route('home') }}" class="hover:text-slate-400 transition-colors">Home</a>
        <span>/</span>
        <span class="text-slate-400">About</span>
    </div>

    <div class="grid gap-16 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">

        {{-- LEFT --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-cyan-500 mb-4">About Me</p>

            {{-- Name + photo --}}
            <div class="flex flex-col gap-6 sm:flex-row sm:items-center mb-8">
                @if ($photoUrl)
                    <div class="shrink-0 relative">
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-cyan-500/30 to-violet-500/20 blur-xl"></div>
                        <img src="{{ $photoUrl }}"
                             alt="{{ $about->name ?? 'Profile Photo' }}"
                             class="relative h-24 w-24 rounded-2xl border border-white/15 object-cover shadow-2xl sm:h-28 sm:w-28">
                    </div>
                @endif
                <div>
                    <h1 class="font-display text-4xl font-bold tracking-tight text-white sm:text-5xl">
                        {{ $about->name ?? 'Muhamad Ariel Saputra' }}
                    </h1>
                    <p class="mt-2 text-slate-400">{{ $about->headline ?? 'IT Support & Laravel Developer' }}</p>
                </div>
            </div>

            {{-- Bio --}}
            <div class="prose prose-invert prose-slate max-w-none space-y-4 text-slate-400 leading-8">
                @php $bio = $about->full_bio ?? $about->short_bio ?? null; @endphp
                @if ($bio)
                    @foreach (preg_split("/\r\n|\n|\r/", trim($bio)) as $paragraph)
                        @if (trim($paragraph) !== '')
                            <p>{{ $paragraph }}</p>
                        @endif
                    @endforeach
                @else
                    <p>Saya memiliki pengalaman dalam IT Support dan Web Development, terbiasa menangani troubleshooting hardware, software, serta jaringan LAN/WAN.</p>
                    <p>Selain itu, saya juga berpengalaman dalam membangun dan men-deploy aplikasi web menggunakan Laravel di lingkungan server Linux.</p>
                    <p>Saya terbuka untuk peluang kerja di bidang IT Support maupun Web Development, dan siap berkontribusi dengan pendekatan yang terstruktur dan problem-solving oriented.</p>
                @endif
            </div>

            {{-- Contact info cards --}}
            <div class="mt-10 grid gap-3 sm:grid-cols-2">
                <div class="rounded-2xl border border-white/10 bg-white/4 p-5">
                    <p class="text-[10px] uppercase tracking-widest text-slate-600 mb-2">Email</p>
                    <p class="text-sm font-medium text-white break-all">{{ $about->email ?? 'muhamadarielsaputra11@gmail.com' }}</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/4 p-5">
                    <p class="text-[10px] uppercase tracking-widest text-slate-600 mb-2">Location</p>
                    <p class="text-sm font-medium text-white">{{ $about->location ?? 'Indonesia' }}</p>
                </div>
            </div>
        </div>

        {{-- RIGHT: STICKY PROFILE CARD --}}
        <div class="lg:sticky lg:top-24 space-y-5">

            {{-- Stats --}}
            <div class="grid grid-cols-2 gap-4">
                <div class="rounded-2xl border border-white/10 bg-white/4 p-5 text-center">
                    <p class="font-display text-3xl font-bold text-white">{{ $experiences->count() }}</p>
                    <p class="mt-1 text-xs text-slate-500 uppercase tracking-widest">Pengalaman</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/4 p-5 text-center">
                    <p class="font-display text-3xl font-bold text-white">{{ $skills->count() }}</p>
                    <p class="mt-1 text-xs text-slate-500 uppercase tracking-widest">Skills</p>
                </div>
            </div>

            {{-- Highlight card --}}
            <div class="rounded-2xl border border-white/10 bg-gradient-to-br from-cyan-500/8 via-violet-500/5 to-transparent p-6">
                <p class="text-xs uppercase tracking-widest text-slate-500 mb-4">Core Strengths</p>
                <div class="space-y-3">
                    @foreach(['IT Support & Troubleshooting', 'Laravel Web Development', 'Linux Server Management', 'LAN/WAN Networking', 'Database MySQL', 'System Documentation'] as $strength)
                        <div class="flex items-center gap-3">
                            <div class="h-1.5 w-1.5 rounded-full bg-cyan-400 shrink-0"></div>
                            <span class="text-sm text-slate-300">{{ $strength }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Tags --}}
            <div class="rounded-2xl border border-white/10 bg-white/4 p-5">
                <p class="text-xs uppercase tracking-widest text-slate-600 mb-4">Technologies</p>
                <div class="flex flex-wrap gap-2">
                    @forelse ($skills->take(12) as $skill)
                        <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-xs font-medium text-slate-300">{{ $skill->name }}</span>
                    @empty
                        <span class="text-slate-500 text-sm">Tambahkan skills dari CMS.</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     EXPERIENCE TIMELINE
═══════════════════════════════════════════════════ --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 border-t border-white/6">
    <p class="text-xs font-semibold uppercase tracking-widest text-violet-400 mb-3">Career</p>
    <h2 class="font-display text-3xl font-bold tracking-tight text-white mb-10">Pengalaman Kerja</h2>

    <div class="relative">
        {{-- Timeline line --}}
        <div class="absolute left-0 top-2 bottom-2 w-px bg-gradient-to-b from-cyan-500/50 via-violet-500/30 to-transparent hidden lg:block" style="left: 11px;"></div>

        <div class="space-y-6">
            @forelse ($experiences as $experience)
                @php
                    $startDate = $experience->start_date ? Carbon::parse($experience->start_date)->format('M Y') : null;
                    $endDate = $experience->end_date ? Carbon::parse($experience->end_date)->format('M Y') : null;
                @endphp
                <div class="relative lg:pl-10">
                    {{-- Dot --}}
                    <div class="absolute left-0 top-5 hidden lg:flex h-5 w-5 items-center justify-center rounded-full border-2 border-cyan-500/50 bg-[#030712]" style="left: 3px;">
                        <div class="h-2 w-2 rounded-full bg-cyan-400"></div>
                    </div>

                    <div class="card-hover rounded-2xl border border-white/10 bg-white/3 p-6 backdrop-blur-sm">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                            <div>
                                <h3 class="font-display text-xl font-semibold text-white">{{ $experience->position }}</h3>
                                <p class="mt-1 text-sm font-medium text-cyan-400">{{ $experience->company }}</p>
                            </div>
                            <span class="shrink-0 text-sm text-slate-500 sm:text-right">
                                {{ $startDate ?? '—' }} — {{ $endDate ?? 'Present' }}
                            </span>
                        </div>
                        <p class="mt-4 text-sm leading-7 text-slate-400">{{ $experience->description }}</p>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-white/10 p-8 text-center text-slate-500">
                    Tambahkan pengalaman kerja dari CMS.
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     EDUCATION
═══════════════════════════════════════════════════ --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 border-t border-white/6">
    <div class="grid gap-16 lg:grid-cols-2">

        {{-- Education --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-emerald-400 mb-3">Education</p>
            <h2 class="font-display text-3xl font-bold tracking-tight text-white mb-8">Latar Belakang Akademik</h2>

            <div class="space-y-4">
                <div class="card-hover rounded-2xl border border-white/10 bg-white/3 p-6">
                    <div class="flex items-start gap-4">
                        <div class="h-10 w-10 rounded-xl bg-violet-500/15 border border-violet-500/20 flex items-center justify-center shrink-0">
                            <span class="text-sm font-bold text-violet-300">UPB</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">Universitas Pelita Bangsa</h3>
                            <p class="mt-1 text-sm text-slate-400">S1 Teknik Informatika · 2021 – 2025</p>
                            <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-emerald-400/10 border border-emerald-400/20 px-3 py-1">
                                <span class="text-xs font-semibold text-emerald-300">IPK 3.52</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-hover rounded-2xl border border-white/10 bg-white/3 p-6">
                    <div class="flex items-start gap-4">
                        <div class="h-10 w-10 rounded-xl bg-cyan-500/15 border border-cyan-500/20 flex items-center justify-center shrink-0">
                            <span class="text-xs font-bold text-cyan-300">SMK</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">SMK Al-Mufti</h3>
                            <p class="mt-1 text-sm text-slate-400">Teknik Komputer dan Jaringan · 2018 – 2021</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Download CV --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-amber-400 mb-3">Resume</p>
            <h2 class="font-display text-3xl font-bold tracking-tight text-white mb-3">Download CV</h2>
            <p class="text-slate-400 mb-8 leading-7">Tersedia dua versi CV yang disesuaikan dengan posisi yang dilamar.</p>

            <div class="space-y-4">
                <div class="card-hover group rounded-2xl border border-white/10 bg-white/3 p-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <div class="h-2 w-2 rounded-full bg-cyan-400"></div>
                                <span class="text-xs uppercase tracking-widest text-cyan-400 font-semibold">IT Support</span>
                            </div>
                            <h3 class="font-semibold text-white">CV IT Support</h3>
                            <p class="mt-1.5 text-sm text-slate-400">Troubleshooting, jaringan LAN/WAN, Mikrotik, Linux server.</p>
                        </div>
                        <a href="{{ asset('cv/cv-it-support.pdf') }}" target="_blank"
                           class="shrink-0 rounded-xl border border-white/15 bg-white/5 px-4 py-2.5 text-sm font-semibold text-white transition-all hover:bg-white/10 hover:border-white/25">
                            Download
                        </a>
                    </div>
                </div>

                <div class="card-hover group rounded-2xl border border-white/10 bg-white/3 p-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <div class="h-2 w-2 rounded-full bg-violet-400"></div>
                                <span class="text-xs uppercase tracking-widest text-violet-400 font-semibold">Developer</span>
                            </div>
                            <h3 class="font-semibold text-white">CV Programmer</h3>
                            <p class="mt-1.5 text-sm text-slate-400">Laravel, MySQL, API integration, deployment aplikasi web.</p>
                        </div>
                        <a href="{{ asset('cv/cv-programmer.pdf') }}" target="_blank"
                           class="shrink-0 rounded-xl border border-white/15 bg-white/5 px-4 py-2.5 text-sm font-semibold text-white transition-all hover:bg-white/10 hover:border-white/25">
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
