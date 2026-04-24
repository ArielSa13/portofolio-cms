@extends('public.layout')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Home | Portfolio')

@section('content')
<section class="mx-auto max-w-7xl px-6 py-14 lg:px-8 lg:py-20">
    <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">

        {{-- LEFT --}}
        <div class="max-w-2xl">
            {{-- <span class="inline-flex rounded-full border border-emerald-400/20 bg-emerald-400/10 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.3em] text-emerald-200">
                Open to Work
            </span> --}}

            <h1 class="mt-6 text-4xl font-semibold leading-tight tracking-tight text-white sm:text-5xl lg:text-6xl">
                {{ $about->headline ?? 'IT Support & Laravel Developer with experience in infrastructure, system support, and web application development.' }}
            </h1>

            <p class="mt-6 max-w-xl text-base leading-8 text-slate-300 sm:text-lg">
                {{ $about->short_bio ?? 'Saya memiliki pengalaman dalam IT Support, pengelolaan server Linux, konfigurasi jaringan, serta pengembangan aplikasi web menggunakan Laravel untuk kebutuhan operasional perusahaan.' }}
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('projects') }}"
                   class="rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950 transition hover:bg-slate-200">
                    View My Work
                </a>

                <a href="{{ route('contact') }}"
                   class="rounded-full border border-white/15 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition hover:border-white/30 hover:bg-white/10">
                    Contact Me
                </a>

                {{-- <a href="{{ asset('cv/cv-programmer.pdf') }}"
                   target="_blank"
                   class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-6 py-3 text-sm font-semibold text-emerald-200 transition hover:border-emerald-400/30 hover:bg-emerald-400/15">
                    Download CV
                </a> --}}
            </div>

            <div class="mt-10 grid gap-4 sm:grid-cols-3">
                <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                    <p class="text-[11px] uppercase tracking-[0.28em] text-slate-500">Projects</p>
                    <p class="mt-3 text-2xl font-semibold text-white">{{ $featuredProjects->count() }}</p>
                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Project yang menunjukkan cara saya membangun dan menyusun sistem.
                    </p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                    <p class="text-[11px] uppercase tracking-[0.28em] text-slate-500">Focus Areas</p>
                    <p class="mt-3 text-2xl font-semibold text-white">{{ $services->count() }}</p>
                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Area utama yang saya kerjakan di support dan development.
                    </p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                    <p class="text-[11px] uppercase tracking-[0.28em] text-slate-500">Skills</p>
                    <p class="mt-3 text-2xl font-semibold text-white">{{ $skills->count() }}</p>
                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Tools dan teknologi yang saya gunakan dalam pekerjaan sehari-hari.
                    </p>
                </div>
            </div>
        </div>

        {{-- RIGHT --}}
        <div>
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-5 shadow-2xl backdrop-blur">
                <div class="rounded-[1.5rem] border border-white/10 bg-[radial-gradient(circle_at_top_left,rgba(34,211,238,0.16),transparent_28%),linear-gradient(135deg,#0b1220,#0f172a,#111827)] p-6">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-[11px] uppercase tracking-[0.3em] text-slate-500">
                                Professional Snapshot
                            </p>
                            <h2 class="mt-3 max-w-md text-2xl font-semibold leading-snug text-white">
                                Building reliable systems across support, infrastructure, and web development.
                            </h2>
                        </div>
                        <div class="mt-2 h-3 w-3 shrink-0 rounded-full bg-emerald-400"></div>
                    </div>

                    <div class="mt-6 rounded-[1.5rem] border border-white/10 bg-slate-950/40 p-5">
                        <div class="flex items-center justify-between gap-4">
                            <span class="rounded-full border border-white/15 px-3 py-1 text-[11px] uppercase tracking-[0.28em] text-slate-300">
                                Profile
                            </span>
                            <span class="text-sm text-slate-400">
                                {{ $about->name ?? 'Muhamad Ariel Saputra' }}
                            </span>
                        </div>

                        <p class="mt-5 text-2xl font-semibold leading-snug text-white">
                            Focused on practical solutions, stable systems, and maintainable implementation.
                        </p>

                        <p class="mt-4 leading-8 text-slate-300">
                            Saya terbiasa menangani kebutuhan teknis dari sisi support, jaringan, hingga pengembangan aplikasi Laravel yang digunakan dalam operasional kerja.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2 text-[11px] uppercase tracking-[0.24em] text-slate-400">
                            <span class="rounded-full border border-white/10 px-3 py-2">IT Support</span>
                            <span class="rounded-full border border-white/10 px-3 py-2">Laravel</span>
                            <span class="rounded-full border border-white/10 px-3 py-2">Linux Server</span>
                            <span class="rounded-full border border-white/10 px-3 py-2">Networking</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="mx-auto max-w-7xl px-6 py-6 lg:px-8 lg:py-8">
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div class="max-w-2xl">
            <p class="text-[11px] font-semibold uppercase tracking-[0.35em] text-slate-500">Selected Work</p>
            <h2 class="mt-4 text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                Projects that reflect how I solve problems and build systems.
            </h2>
        </div>

        <a href="{{ route('projects') }}"
           class="text-sm font-medium text-cyan-200 transition hover:text-white">
            View all projects →
        </a>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($featuredProjects as $project)
            <a href="{{ route('projects.show', $project) }}"
               class="group overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 transition duration-300 hover:-translate-y-1 hover:border-white/20 hover:bg-white/10 hover:shadow-2xl">
                <div class="aspect-[16/10] overflow-hidden bg-slate-900">
                    @if ($project->cover_image)
                        <img src="{{ asset($project->cover_image) }}"
                             alt="{{ $project->title }}"
                             class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    @else
                        <div class="flex h-full w-full items-end bg-[radial-gradient(circle_at_top_left,rgba(34,211,238,0.18),transparent_30%),linear-gradient(135deg,#0f172a,#111827,#020617)] p-6">
                            <div>
                                <p class="text-xs uppercase tracking-[0.35em] text-slate-400">
                                    {{ $project->category ?: 'Project' }}
                                </p>
                                <p class="mt-3 text-2xl font-semibold text-white">
                                    {{ $project->title }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="p-6">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">
                        {{ $project->category ?: 'Project' }}
                    </p>

                    <h3 class="mt-3 text-2xl font-semibold tracking-tight text-white">
                        {{ $project->title }}
                    </h3>

                    <p class="mt-4 text-sm leading-7 text-slate-300">
                        {{ Str::limit($project->description, 115) }}
                    </p>

                    <div class="mt-6 inline-flex items-center gap-2 text-sm font-medium text-cyan-200">
                        View project details <span>→</span>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full rounded-[2rem] border border-dashed border-white/15 px-8 py-14 text-center text-slate-400">
                Belum ada featured project. Tambahkan dari admin panel.
            </div>
        @endforelse
    </div>
</section>

<section class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
    <div class="grid gap-6 lg:grid-cols-[0.92fr_1.08fr]">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.35em] text-slate-500">Focus Areas</p>
            <h2 class="mt-4 text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                Areas where I contribute across support and development.
            </h2>
            <p class="mt-5 max-w-md leading-8 text-slate-300">
                Saya bekerja di area IT Support dan Web Development, mulai dari troubleshooting sistem, pengelolaan jaringan dan server, hingga pengembangan aplikasi berbasis Laravel yang digunakan dalam operasional kerja.
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-2">
            @forelse ($services as $service)
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300">
                        {{ strtoupper(substr($service->title, 0, 2)) }}
                    </div>

                    <h3 class="mt-6 text-2xl font-semibold text-white">{{ $service->title }}</h3>

                    <p class="mt-4 text-sm leading-7 text-slate-300">
                        {{ $service->description }}
                    </p>
                </div>
            @empty
                <div class="rounded-[2rem] border border-dashed border-white/15 p-6 text-slate-400">
                    Tambahkan fokus area dari CMS.
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-6 pb-20 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr]">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.35em] text-slate-500">Skills</p>
            <h2 class="mt-4 text-3xl font-semibold tracking-tight text-white sm:text-4xl">
                Technologies and tools I use to build and maintain systems.
            </h2>
            <p class="mt-5 max-w-lg leading-8 text-slate-300">
                Saya menggunakan berbagai tools untuk mendukung pekerjaan di sisi support maupun development, termasuk pengelolaan server Linux, konfigurasi jaringan, serta pengembangan aplikasi web menggunakan Laravel dan MySQL.
            </p>
        </div>

        <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
            <div class="flex flex-wrap gap-3">
                @forelse ($skills as $skill)
                    <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-200">
                        {{ $skill->name }}
                    </span>
                @empty
                    <span class="text-slate-400">Tambahkan skills dari CMS.</span>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection