@extends('public.layout')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Projects — ' . ($about->name ?? 'Portfolio'))

@section('content')

<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-8">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-xs text-slate-600 mb-12">
        <a href="{{ route('home') }}" class="hover:text-slate-400 transition-colors">Home</a>
        <span>/</span>
        <span class="text-slate-400">Projects</span>
    </div>

    {{-- Header --}}
    <div class="max-w-3xl mb-16">
        <p class="text-xs font-semibold uppercase tracking-widest text-cyan-500 mb-4">Portfolio</p>
        <h1 class="font-display text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-6xl">
            Projects saya
        </h1>
        <p class="mt-5 text-lg leading-8 text-slate-400">
            Setiap project di halaman ini menunjukkan cara saya menyusun fitur, memilih stack, dan membangun sistem yang terstruktur dan maintainable.
        </p>
    </div>

    {{-- Grid --}}
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($projects as $project)
            <a href="{{ route('projects.show', $project) }}"
               class="group card-hover flex flex-col overflow-hidden rounded-2xl border border-white/10 bg-white/3 backdrop-blur-sm">

                {{-- Cover --}}
                <div class="aspect-[16/10] overflow-hidden bg-slate-900/80 shrink-0">
                    @if ($project->cover_image)
                        <img src="{{ asset($project->cover_image) }}"
                             alt="{{ $project->title }}"
                             class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.04]">
                    @else
                        <div class="flex h-full w-full flex-col justify-end p-6 bg-gradient-to-br from-slate-900 via-slate-800/80 to-slate-950">
                            <p class="text-[10px] uppercase tracking-widest text-slate-500 mb-2">{{ $project->category ?: 'Project' }}</p>
                            <p class="font-display text-xl font-bold text-white">{{ $project->title }}</p>
                        </div>
                    @endif
                </div>

                {{-- Body --}}
                <div class="flex flex-col flex-1 p-6">
                    <div class="flex items-center justify-between gap-3 mb-3">
                        <span class="text-[10px] uppercase tracking-widest text-slate-500 font-medium">{{ $project->category ?: 'Project' }}</span>
                        @if ($project->is_featured)
                            <span class="rounded-full bg-cyan-400/10 border border-cyan-400/20 px-2.5 py-1 text-[10px] font-semibold text-cyan-300 uppercase tracking-wide">Featured</span>
                        @endif
                    </div>

                    <h2 class="font-display text-lg font-semibold text-white leading-snug group-hover:text-cyan-100 transition-colors">
                        {{ $project->title }}
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-slate-400 flex-1">
                        {{ Str::limit($project->description, 120) }}
                    </p>

                    {{-- Tech tags if available --}}
                    @if ($project->tech_stack ?? null)
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            @foreach (explode(',', $project->tech_stack) as $tech)
                                <span class="rounded-md bg-white/5 px-2 py-1 text-[10px] font-medium text-slate-400 border border-white/8">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-5 flex items-center justify-between">
                        <span class="inline-flex items-center gap-1.5 text-sm font-medium text-cyan-400 group-hover:text-cyan-300 transition-colors">
                            Lihat Detail
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </span>

                        {{-- External links --}}
                        <div class="flex items-center gap-2" onclick="event.preventDefault()">
                            @if ($project->demo_url ?? null)
                                <a href="{{ $project->demo_url }}" target="_blank"
                                   class="text-xs text-slate-500 hover:text-white transition-colors border border-white/10 rounded-lg px-2.5 py-1.5 hover:border-white/20 hover:bg-white/5">
                                    Demo
                                </a>
                            @endif
                            @if ($project->repo_url ?? null)
                                <a href="{{ $project->repo_url }}" target="_blank"
                                   class="text-xs text-slate-500 hover:text-white transition-colors border border-white/10 rounded-lg px-2.5 py-1.5 hover:border-white/20 hover:bg-white/5">
                                    Repo
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full rounded-2xl border border-dashed border-white/10 px-8 py-20 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl border border-white/10 bg-white/5">
                    <svg class="h-6 w-6 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"/>
                    </svg>
                </div>
                <p class="text-slate-400 font-medium">Belum ada project yang dipublikasikan</p>
                <p class="mt-1 text-sm text-slate-600">Tambahkan dari admin panel.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if ($projects->hasPages())
        <div class="mt-12 flex justify-center">
            <div class="text-slate-400 [&_.pagination]:flex [&_.pagination]:gap-2 [&_.page-link]:rounded-xl [&_.page-link]:border [&_.page-link]:border-white/10 [&_.page-link]:bg-white/5 [&_.page-link]:px-4 [&_.page-link]:py-2 [&_.page-link]:text-sm [&_.page-link:hover]:bg-white/10 [&_.page-link:hover]:text-white [&_.active_.page-link]:bg-white/15 [&_.active_.page-link]:text-white [&_.active_.page-link]:border-white/20">
                {{ $projects->links() }}
            </div>
        </div>
    @endif
</section>

@endsection
