@extends('public.layout')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Projects | Portfolio')

@section('content')
<section class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
    <div class="max-w-3xl">
        <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">Projects</p>
        <h1 class="mt-4 text-5xl font-semibold tracking-tight text-white lg:text-6xl">Projects that show my technical approach and execution.</h1>
        <p class="mt-6 text-lg leading-8 text-slate-300">Setiap project di halaman ini ditampilkan sebagai bukti cara saya menyusun fitur, memilih stack, dan membangun aplikasi yang terstruktur.</p>
    </div>

    <div class="mt-14 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($projects as $project)
            <a href="{{ route('projects.show', $project) }}" class="group overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 transition duration-300 hover:-translate-y-1 hover:border-white/20 hover:bg-white/10 hover:shadow-2xl">
                <div class="aspect-[16/10] overflow-hidden bg-slate-900">
                    @if ($project->cover_image)
                        <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    @else
                        <div class="flex h-full w-full items-end bg-[radial-gradient(circle_at_top_left,rgba(34,211,238,0.16),transparent_28%),linear-gradient(135deg,#0f172a,#111827,#020617)] p-6">
                            <div>
                                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">{{ $project->category ?: 'Project' }}</p>
                                <p class="mt-3 text-2xl font-semibold text-white">{{ $project->title }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between gap-4">
                        <p class="text-xs uppercase tracking-[0.3em] text-slate-500">{{ $project->category ?: 'Project' }}</p>
                        @if ($project->is_featured)
                            <span class="rounded-full border border-cyan-400/20 bg-cyan-400/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.25em] text-cyan-200">Featured</span>
                        @endif
                    </div>
                    <h2 class="mt-4 text-2xl font-semibold tracking-tight text-white">{{ $project->title }}</h2>
                    <p class="mt-4 text-sm leading-7 text-slate-300">{{ Str::limit($project->description, 120) }}</p>
                    <div class="mt-6 text-sm font-medium text-cyan-200">View details →</div>
                </div>
            </a>
        @empty
            <div class="col-span-full rounded-[2rem] border border-dashed border-white/15 px-8 py-14 text-center text-slate-400">
                Belum ada project yang dipublikasikan.
            </div>
        @endforelse
    </div>

    <div class="mt-10 text-slate-300">
        {{ $projects->links() }}
    </div>
</section>
@endsection
