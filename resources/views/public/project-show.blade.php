@extends('public.layout')

@php use Illuminate\Support\Str; @endphp

@section('title', $project->title . ' — ' . ($about->name ?? 'Portfolio'))

@section('content')
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-12">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-xs text-slate-400 mb-12">
        <a href="{{ route('home') }}" class="hover:text-indigo-600 transition-colors">Home</a>
        <span>/</span>
        <a href="{{ route('projects') }}" class="hover:text-indigo-600 transition-colors">Projects</a>
        <span>/</span>
        <span class="text-slate-500">{{ Str::limit($project->title, 30) }}</span>
    </div>

    <div class="grid gap-10 lg:grid-cols-[1fr_320px] lg:items-start">
        {{-- Main --}}
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-indigo-500 mb-4">{{ $project->category ?: 'Project' }}</p>
            <h1 class="font-display text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">{{ $project->title }}</h1>
            <p class="mt-5 max-w-3xl text-lg leading-8 text-slate-500">{{ $project->description }}</p>
        </div>

        {{-- Sidebar --}}
        <aside class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-5">Quick Overview</p>
            <div class="space-y-5 text-sm">
                <div>
                    <p class="text-slate-400 text-xs uppercase tracking-widest font-semibold">Status</p>
                    <p class="mt-1.5 font-semibold text-slate-700">{{ ucfirst($project->status ?? 'published') }}</p>
                </div>
                <div>
                    <p class="text-slate-400 text-xs uppercase tracking-widest font-semibold">Published</p>
                    <p class="mt-1.5 font-semibold text-slate-700">{{ optional($project->published_at)->format('d M Y') ?? '—' }}</p>
                </div>
                <div>
                    <p class="text-slate-400 text-xs uppercase tracking-widest font-semibold">Tech Stack</p>
                    <div class="mt-2 flex flex-wrap gap-1.5">
                        @forelse ($project->tech_list as $tech)
                            <span class="rounded-full border border-indigo-100 bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-600">{{ $tech }}</span>
                        @empty
                            <span class="text-slate-400">—</span>
                        @endforelse
                    </div>
                </div>
                @if ($project->demo_url)
                    <a href="{{ $project->demo_url }}" target="_blank"
                       class="flex items-center justify-center gap-2 rounded-xl btn-primary px-4 py-3 text-sm font-bold shadow-md shadow-indigo-200">
                        Open Live Demo
                    </a>
                @endif
                @if ($project->repo_url)
                    <a href="{{ $project->repo_url }}" target="_blank"
                       class="flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-bold text-slate-700 transition hover:border-indigo-300 hover:text-indigo-600 hover:bg-indigo-50">
                        Open Repository
                    </a>
                @endif
            </div>
        </aside>
    </div>

    {{-- Cover image --}}
    <div class="mt-12 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="aspect-[16/8.5] overflow-hidden bg-slate-100">
            @if ($project->cover_image)
                <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
            @else
                <div class="flex h-full w-full items-end bg-gradient-to-br from-indigo-50 via-slate-50 to-violet-50 p-8">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-indigo-400 mb-3">Case Study</p>
                        <p class="max-w-xl font-display text-3xl font-bold text-slate-800">Project detail yang menjelaskan implementasi dan keputusan teknis.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Content --}}
    <div class="mt-12 grid gap-8 lg:grid-cols-[1fr_280px]">
        <article class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm leading-8 text-slate-600">
            {!! nl2br(e($project->content)) !!}
        </article>
        <aside class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Why it matters</p>
            <h2 class="font-display text-xl font-bold text-slate-800">Project sebagai bukti kemampuan teknis</h2>
            <p class="mt-4 leading-7 text-slate-500">Halaman detail project membantu menjelaskan konteks, fitur, stack, dan keputusan implementasi sehingga karya Anda lebih mudah dinilai oleh recruiter atau hiring manager.</p>
        </aside>
    </div>
</section>

{{-- Related --}}
<section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-24">
    <div class="flex items-end justify-between gap-6 mb-8">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-3">Related Projects</p>
            <h2 class="font-display text-2xl font-bold tracking-tight text-slate-900">Project lainnya</h2>
        </div>
        <a href="{{ route('projects') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition-colors">Semua projects →</a>
    </div>
    <div class="grid gap-5 md:grid-cols-3">
        @foreach ($relatedProjects as $related)
            <a href="{{ route('projects.show', $related) }}"
               class="card-hover rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-3">{{ $related->category ?: 'Project' }}</p>
                <h3 class="font-display text-lg font-bold text-slate-800">{{ $related->title }}</h3>
                <p class="mt-3 text-sm leading-7 text-slate-500">{{ Str::limit($related->description, 90) }}</p>
            </a>
        @endforeach
    </div>
</section>
@endsection
