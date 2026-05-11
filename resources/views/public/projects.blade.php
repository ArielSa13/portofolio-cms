@extends('public.layout')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Projects — ' . ($about->name ?? 'Portfolio'))

@section('content')

<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-8">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-xs text-slate-400 mb-12">
        <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Home</a>
        <span>/</span>
        <span class="text-slate-500">Projects</span>
    </div>

    <div class="max-w-3xl mb-16">
        <p class="text-xs font-bold uppercase tracking-widest text-indigo-500 mb-4">Portfolio</p>
        <h1 class="font-display text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
            Projects saya
        </h1>
        <p class="mt-5 text-lg leading-8 text-slate-500">
            Setiap project menunjukkan cara saya menyusun fitur, memilih stack, dan membangun sistem yang terstruktur dan maintainable.
        </p>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($projects as $project)
            <a href="{{ route('projects.show', $project) }}"
               class="group card-hover flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="aspect-[16/10] overflow-hidden bg-slate-100 shrink-0">
                    @if ($project->cover_image)
                        <img src="{{ asset($project->cover_image) }}"
                             alt="{{ $project->title }}"
                             class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.04]">
                    @else
                        <div class="flex h-full w-full flex-col justify-end p-6 bg-gradient-to-br from-indigo-50 via-slate-50 to-violet-50">
                            <p class="text-[10px] uppercase tracking-widest text-indigo-400 mb-2 font-bold">{{ $project->category ?: 'Project' }}</p>
                            <p class="font-display text-xl font-bold text-slate-800">{{ $project->title }}</p>
                        </div>
                    @endif
                </div>

                <div class="flex flex-col flex-1 p-6">
                    <div class="flex items-center justify-between gap-3 mb-3">
                        <span class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">{{ $project->category ?: 'Project' }}</span>
                        @if ($project->is_featured)
                            <span class="rounded-full bg-indigo-50 border border-indigo-200 px-2.5 py-1 text-[10px] font-bold text-indigo-600 uppercase tracking-wide">Featured</span>
                        @endif
                    </div>

                    <h2 class="font-display text-lg font-bold text-slate-800 leading-snug group-hover:text-indigo-600 transition-colors">
                        {{ $project->title }}
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-slate-500 flex-1">
                        {{ Str::limit($project->description, 120) }}
                    </p>

                    @if ($project->tech_stack ?? null)
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            @foreach (explode(',', $project->tech_stack) as $tech)
                                <span class="rounded-md bg-slate-50 border border-slate-200 px-2 py-1 text-[10px] font-semibold text-slate-500">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-5 flex items-center justify-between">
                        <span class="inline-flex items-center gap-1.5 text-sm font-semibold text-indigo-500 group-hover:text-indigo-700 transition-colors">
                            Lihat Detail
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </span>
                        <div class="flex items-center gap-2" onclick="event.preventDefault()">
                            @if ($project->demo_url ?? null)
                                <a href="{{ $project->demo_url }}" target="_blank"
                                   class="text-xs text-slate-500 hover:text-indigo-600 transition-colors border border-slate-200 rounded-lg px-2.5 py-1.5 hover:border-indigo-200 hover:bg-indigo-50 font-medium">Demo</a>
                            @endif
                            @if ($project->repo_url ?? null)
                                <a href="{{ $project->repo_url }}" target="_blank"
                                   class="text-xs text-slate-500 hover:text-indigo-600 transition-colors border border-slate-200 rounded-lg px-2.5 py-1.5 hover:border-indigo-200 hover:bg-indigo-50 font-medium">Repo</a>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full rounded-2xl border border-dashed border-slate-200 px-8 py-20 text-center bg-white">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50">
                    <svg class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"/>
                    </svg>
                </div>
                <p class="text-slate-500 font-semibold">Belum ada project yang dipublikasikan</p>
                <p class="mt-1 text-sm text-slate-400">Tambahkan dari admin panel.</p>
            </div>
        @endforelse
    </div>

    @if ($projects->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $projects->links() }}
        </div>
    @endif
</section>

@endsection
