@extends('public.layout')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', $project->title . ' | Portfolio')

@section('content')
<section class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-[1fr_320px] lg:items-start">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">{{ $project->category ?: 'Project' }}</p>
            <h1 class="mt-4 text-5xl font-semibold tracking-tight text-white lg:text-6xl">{{ $project->title }}</h1>
            <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-300">{{ $project->description }}</p>
        </div>
        <aside class="rounded-[2rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">Quick overview</p>
            <div class="mt-6 space-y-6 text-sm">
                <div>
                    <p class="text-slate-500">Status</p>
                    <p class="mt-2 font-medium text-white">{{ ucfirst($project->status ?? 'published') }}</p>
                </div>
                <div>
                    <p class="text-slate-500">Published</p>
                    <p class="mt-2 font-medium text-white">{{ optional($project->published_at)->format('d M Y') ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-slate-500">Tech stack</p>
                    <div class="mt-3 flex flex-wrap gap-2">
                        @forelse ($project->tech_list as $tech)
                            <span class="rounded-full border border-white/10 bg-slate-950/60 px-3 py-1.5 text-xs text-slate-200">{{ $tech }}</span>
                        @empty
                            <span class="text-slate-400">-</span>
                        @endforelse
                    </div>
                </div>
                @if ($project->demo_url)
                    <a href="{{ $project->demo_url }}" target="_blank" class="block rounded-2xl bg-white px-4 py-3 text-center font-semibold text-slate-950 transition hover:bg-slate-200">Open Live Demo</a>
                @endif
                @if ($project->repo_url)
                    <a href="{{ $project->repo_url }}" target="_blank" class="block rounded-2xl border border-white/10 px-4 py-3 text-center font-semibold text-white transition hover:border-white/20 hover:bg-white/5">Open Repository</a>
                @endif
            </div>
        </aside>
    </div>

    <div class="mt-12 overflow-hidden rounded-[2.5rem] border border-white/10 bg-white/5">
        <div class="aspect-[16/8.5] overflow-hidden bg-slate-900">
            @if ($project->cover_image)
                <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
            @else
                <div class="flex h-full w-full items-end bg-[radial-gradient(circle_at_top_left,rgba(34,211,238,0.18),transparent_28%),radial-gradient(circle_at_bottom_right,rgba(217,70,239,0.16),transparent_20%),linear-gradient(135deg,#0f172a,#111827,#020617)] p-8">
                    <div>
                        <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Case Study</p>
                        <p class="mt-4 max-w-xl text-4xl font-semibold text-white">A project page that explains implementation, decisions, and outcomes clearly.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="mt-12 grid gap-10 lg:grid-cols-[1fr_280px]">
        <article class="rounded-[2rem] border border-white/10 bg-white/5 p-8 leading-8 text-slate-300">
            {!! nl2br(e($project->content)) !!}
        </article>
        <aside class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">Why it matters</p>
            <h2 class="mt-4 text-2xl font-semibold text-white">Show the project as proof of technical thinking.</h2>
            <p class="mt-4 leading-8 text-slate-300">Halaman detail project membantu menjelaskan konteks, fitur, stack, dan keputusan implementasi sehingga karya Anda lebih mudah dinilai oleh recruiter atau hiring manager.</p>
        </aside>
    </div>
</section>

<section class="mx-auto max-w-7xl px-6 pb-20 lg:px-8">
    <div class="flex items-end justify-between gap-6">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">Related projects</p>
            <h2 class="mt-4 text-3xl font-semibold tracking-tight text-white">Continue exploring similar work.</h2>
        </div>
        <a href="{{ route('projects') }}" class="text-sm font-medium text-cyan-200 transition hover:text-white">All projects →</a>
    </div>
    <div class="mt-8 grid gap-6 md:grid-cols-3">
        @foreach ($relatedProjects as $related)
            <a href="{{ route('projects.show', $related) }}" class="rounded-[2rem] border border-white/10 bg-white/5 p-6 transition hover:-translate-y-1 hover:border-white/20 hover:bg-white/10">
                <p class="text-xs uppercase tracking-[0.3em] text-slate-500">{{ $related->category ?: 'Project' }}</p>
                <h3 class="mt-4 text-2xl font-semibold text-white">{{ $related->title }}</h3>
                <p class="mt-4 text-sm leading-7 text-slate-300">{{ Str::limit($related->description, 90) }}</p>
            </a>
        @endforeach
    </div>
</section>
@endsection
