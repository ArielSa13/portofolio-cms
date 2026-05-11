@extends('public.layout')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', ($about->name ?? 'Portfolio') . ' — IT Support & Laravel Developer')

@section('content')

{{-- ═══════════════════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════════════════ --}}
<section class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-16 lg:pt-28 lg:pb-24">
    <div class="grid gap-16 lg:grid-cols-2 lg:items-center">

        {{-- LEFT: TEXT --}}
        <div class="animate-fadeup">

            {{-- Status badge --}}
            <div class="inline-flex items-center gap-2 rounded-full border border-emerald-400/20 bg-emerald-400/8 px-4 py-2 mb-8">
                <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-xs font-medium text-emerald-300 tracking-wide">Open to Work · Available Now</span>
            </div>

            <h1 class="font-display text-4xl font-bold leading-[1.15] tracking-tight text-white sm:text-5xl lg:text-6xl">
                {{ $about->headline ?? 'IT Support & Laravel Developer' }}
            </h1>

            <p class="mt-6 text-base leading-8 text-slate-400 max-w-lg sm:text-lg">
                {{ $about->short_bio ?? 'Berpengalaman dalam IT Support, pengelolaan server Linux, konfigurasi jaringan, dan pengembangan aplikasi web berbasis Laravel.' }}
            </p>

            {{-- CTA --}}
            <div class="mt-10 flex flex-wrap gap-3">
                <a href="{{ route('projects') }}"
                   class="inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition-all hover:bg-slate-100 hover:shadow-lg hover:shadow-white/10 hover:-translate-y-0.5">
                    Lihat Projects
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition-all hover:bg-white/10 hover:border-white/25 hover:-translate-y-0.5">
                    Hubungi Saya
                </a>
            </div>

            {{-- Stats --}}
            <div class="mt-12 flex flex-wrap gap-8">
                <div>
                    <p class="text-3xl font-bold text-white font-display">{{ $featuredProjects->count() }}+</p>
                    <p class="mt-1 text-xs text-slate-500 uppercase tracking-widest">Projects</p>
                </div>
                <div class="w-px bg-white/10"></div>
                <div>
                    <p class="text-3xl font-bold text-white font-display">{{ $services->count() }}</p>
                    <p class="mt-1 text-xs text-slate-500 uppercase tracking-widest">Focus Areas</p>
                </div>
                <div class="w-px bg-white/10"></div>
                <div>
                    <p class="text-3xl font-bold text-white font-display">{{ $skills->count() }}+</p>
                    <p class="mt-1 text-xs text-slate-500 uppercase tracking-widest">Skills</p>
                </div>
            </div>
        </div>

        {{-- RIGHT: PROFILE CARD --}}
        <div class="animate-fadeup" style="animation-delay: 0.15s; opacity: 0; animation-fill-mode: forwards;">
            <div class="relative">
                {{-- Glow behind card --}}
                <div class="absolute inset-0 rounded-[2.5rem] bg-gradient-to-br from-cyan-500/15 via-violet-500/10 to-transparent blur-2xl scale-95"></div>

                <div class="relative rounded-[2.5rem] border border-white/10 bg-white/4 p-1 backdrop-blur-sm shadow-2xl">
                    <div class="rounded-[2rem] border border-white/8 bg-gradient-to-br from-slate-900 via-[#0c1120] to-slate-950 p-7">

                        {{-- Header --}}
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-cyan-400 to-violet-500 flex items-center justify-center shadow-lg shadow-cyan-500/20">
                                    <span class="text-sm font-bold text-white">{{ strtoupper(substr($about->name ?? 'A', 0, 1)) }}</span>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-white">{{ $about->name ?? 'Muhamad Ariel Saputra' }}</p>
                                    <p class="text-xs text-slate-500">IT Support · Laravel Dev</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-1.5 rounded-full bg-emerald-400/10 border border-emerald-400/20 px-3 py-1.5">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span class="text-[11px] font-medium text-emerald-300">Active</span>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="h-px bg-gradient-to-r from-transparent via-white/10 to-transparent mb-6"></div>

                        {{-- Info rows --}}
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-slate-500 uppercase tracking-widest">Location</span>
                                <span class="text-sm text-slate-300">{{ $about->location ?? 'Indonesia' }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-slate-500 uppercase tracking-widest">Education</span>
                                <span class="text-sm text-slate-300">S1 Teknik Informatika</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-slate-500 uppercase tracking-widest">Status</span>
                                <span class="text-sm text-emerald-300 font-medium">Available</span>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="h-px bg-gradient-to-r from-transparent via-white/10 to-transparent my-6"></div>

                        {{-- Tags --}}
                        <div class="flex flex-wrap gap-2">
                            @foreach(['IT Support', 'Laravel', 'Linux', 'Networking', 'MySQL', 'PHP'] as $tag)
                                <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-[11px] font-medium text-slate-300 tracking-wide">{{ $tag }}</span>
                            @endforeach
                        </div>

                        {{-- Bottom bar --}}
                        <div class="mt-6 flex items-center justify-between rounded-2xl border border-white/8 bg-white/4 px-5 py-4">
                            <div>
                                <p class="text-xs text-slate-500">Siap untuk</p>
                                <p class="text-sm font-semibold text-white mt-0.5">Full-time · Freelance</p>
                            </div>
                            <a href="{{ route('contact') }}" class="rounded-xl bg-white px-4 py-2 text-xs font-bold text-slate-900 hover:bg-slate-100 transition-colors">
                                Let's Talk
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     FEATURED PROJECTS
═══════════════════════════════════════════════════════════ --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between mb-12">
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-cyan-500 mb-3">Selected Work</p>
            <h2 class="font-display text-3xl font-bold tracking-tight text-white sm:text-4xl">
                Projects yang saya kerjakan
            </h2>
            <p class="mt-3 text-slate-400 max-w-xl">Kumpulan project yang mencerminkan cara saya membangun dan menyelesaikan masalah teknis.</p>
        </div>
        <a href="{{ route('projects') }}"
           class="inline-flex shrink-0 items-center gap-2 rounded-full border border-white/15 px-5 py-2.5 text-sm font-medium text-slate-300 transition-all hover:text-white hover:border-white/25 hover:bg-white/5">
            Semua Projects
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
            </svg>
        </a>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($featuredProjects as $project)
            <a href="{{ route('projects.show', $project) }}"
               class="group card-hover flex flex-col overflow-hidden rounded-2xl border border-white/10 bg-white/3 backdrop-blur-sm">

                {{-- Image --}}
                <div class="aspect-[16/10] overflow-hidden bg-slate-900/80 shrink-0">
                    @if ($project->cover_image)
                        <img src="{{ asset($project->cover_image) }}"
                             alt="{{ $project->title }}"
                             class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.03]">
                    @else
                        <div class="flex h-full w-full items-end p-6"
                             style="background: linear-gradient(135deg, #0f172a 0%, #111827 60%, #0a0f1e 100%)">
                            <div>
                                <p class="text-[10px] uppercase tracking-widest text-slate-500 mb-2">{{ $project->category ?: 'Project' }}</p>
                                <p class="text-xl font-bold text-white font-display">{{ $project->title }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Content --}}
                <div class="flex flex-col flex-1 p-6">
                    <div class="flex items-center justify-between gap-3 mb-3">
                        <span class="text-[10px] uppercase tracking-widest text-slate-500">{{ $project->category ?: 'Project' }}</span>
                        @if ($project->is_featured)
                            <span class="rounded-full bg-cyan-400/10 border border-cyan-400/20 px-2.5 py-1 text-[10px] font-semibold text-cyan-300 uppercase tracking-wide">Featured</span>
                        @endif
                    </div>

                    <h3 class="font-display text-lg font-semibold text-white group-hover:text-cyan-100 transition-colors">
                        {{ $project->title }}
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-400 flex-1">
                        {{ Str::limit($project->description, 110) }}
                    </p>

                    <div class="mt-5 flex items-center gap-2 text-sm font-medium text-cyan-400 group-hover:text-cyan-300 transition-colors">
                        Lihat Detail
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                        </svg>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full rounded-2xl border border-dashed border-white/10 px-8 py-16 text-center">
                <p class="text-slate-500">Belum ada featured project.</p>
                <p class="mt-2 text-sm text-slate-600">Tambahkan dari admin panel.</p>
            </div>
        @endforelse
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     SERVICES / FOCUS AREAS
═══════════════════════════════════════════════════════════ --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 border-t border-white/6">
    <div class="grid gap-16 lg:grid-cols-[1fr_1.2fr] lg:items-start">

        {{-- Left --}}
        <div class="lg:sticky lg:top-28">
            <p class="text-xs font-semibold uppercase tracking-widest text-violet-400 mb-3">What I Do</p>
            <h2 class="font-display text-3xl font-bold tracking-tight text-white sm:text-4xl">
                Area yang saya kuasai
            </h2>
            <p class="mt-4 leading-8 text-slate-400 max-w-md">
                Saya bekerja di persimpangan antara IT Support dan Web Development — dari troubleshooting sistem hingga membangun aplikasi Laravel yang dipakai dalam operasional kerja.
            </p>
            <a href="{{ route('about') }}"
               class="inline-flex items-center gap-2 mt-8 text-sm font-medium text-white/70 hover:text-white transition-colors">
                Lebih lanjut tentang saya
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>

        {{-- Right: Service cards --}}
        <div class="grid gap-4 sm:grid-cols-2">
            @forelse ($services as $index => $service)
                <div class="card-hover group rounded-2xl border border-white/10 bg-white/3 p-6 backdrop-blur-sm">
                    {{-- Icon placeholder --}}
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-xl border border-white/10 bg-gradient-to-br
                        {{ $index % 4 == 0 ? 'from-cyan-500/20 to-cyan-600/10' : ($index % 4 == 1 ? 'from-violet-500/20 to-violet-600/10' : ($index % 4 == 2 ? 'from-emerald-500/20 to-emerald-600/10' : 'from-amber-500/20 to-amber-600/10')) }}">
                        <span class="text-sm font-bold
                            {{ $index % 4 == 0 ? 'text-cyan-300' : ($index % 4 == 1 ? 'text-violet-300' : ($index % 4 == 2 ? 'text-emerald-300' : 'text-amber-300')) }}">
                            {{ strtoupper(substr($service->title, 0, 2)) }}
                        </span>
                    </div>

                    <h3 class="font-display text-base font-semibold text-white group-hover:text-cyan-100 transition-colors">
                        {{ $service->title }}
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-400">{{ $service->description }}</p>
                </div>
            @empty
                <div class="col-span-2 rounded-2xl border border-dashed border-white/10 p-8 text-center text-slate-500">
                    Tambahkan focus area dari CMS.
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     SKILLS
═══════════════════════════════════════════════════════════ --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 border-t border-white/6">
    <div class="grid gap-16 lg:grid-cols-[1fr_1.5fr] lg:items-center">

        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-emerald-400 mb-3">Tech Stack</p>
            <h2 class="font-display text-3xl font-bold tracking-tight text-white sm:text-4xl">
                Tools & teknologi yang saya gunakan
            </h2>
            <p class="mt-4 leading-8 text-slate-400 max-w-md">
                Dari server Linux hingga framework Laravel — semua yang saya pakai sehari-hari untuk support dan development.
            </p>
        </div>

        <div class="rounded-2xl border border-white/10 bg-white/3 p-7 backdrop-blur-sm">
            <div class="flex flex-wrap gap-2.5">
                @forelse ($skills as $skill)
                    <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-slate-300 hover:border-white/20 hover:text-white transition-all cursor-default">
                        {{ $skill->name }}
                    </span>
                @empty
                    <span class="text-slate-500">Tambahkan skills dari CMS.</span>
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     CTA BOTTOM
═══════════════════════════════════════════════════════════ --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20">
    <div class="relative overflow-hidden rounded-3xl border border-white/10 p-12 text-center"
         style="background: linear-gradient(135deg, rgba(34,211,238,0.06) 0%, rgba(129,140,248,0.06) 50%, rgba(16,24,40,0.8) 100%)">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(34,211,238,0.08),transparent_60%)] pointer-events-none"></div>

        <div class="relative">
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-400/20 bg-emerald-400/8 px-4 py-1.5 mb-6">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-xs font-medium text-emerald-300">Open to new opportunities</span>
            </span>

            <h2 class="font-display text-3xl font-bold text-white sm:text-4xl lg:text-5xl">
                Tertarik bekerja sama?
            </h2>
            <p class="mt-4 text-slate-400 max-w-xl mx-auto leading-8">
                Saya siap berdiskusi tentang peluang kerja, project, atau kolaborasi teknis. Jangan ragu untuk menghubungi saya.
            </p>

            <div class="mt-8 flex flex-wrap gap-4 justify-center">
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center gap-2 rounded-full bg-white px-7 py-3.5 text-sm font-semibold text-slate-900 transition-all hover:bg-slate-100 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-white/10">
                    Mulai Percakapan
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
                <a href="{{ route('about') }}"
                   class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-7 py-3.5 text-sm font-semibold text-white transition-all hover:bg-white/10 hover:border-white/25 hover:-translate-y-0.5">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
