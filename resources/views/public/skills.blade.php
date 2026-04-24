@extends('public.layout')

@section('title', 'Skills | Portfolio')

@section('content')
<section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
    <div class="max-w-3xl">
        <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">Skills</p>
        <h1 class="mt-4 text-5xl font-semibold tracking-tight text-white lg:text-6xl">Technologies and tools I use in my projects.</h1>
        <p class="mt-6 text-lg leading-8 text-slate-300">Bagian ini menampilkan stack utama yang saya gunakan untuk membangun aplikasi web, mulai dari backend, database, sampai tools pendukung workflow.</p>
    </div>

    <div class="mt-14 space-y-8">
        @forelse ($skills as $category => $items)
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8">
                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">{{ $category }}</p>
                <div class="mt-6 flex flex-wrap gap-3">
                    @foreach ($items as $skill)
                        <span class="rounded-full border border-white/10 bg-slate-950/60 px-4 py-2 text-sm text-slate-200">{{ $skill->name }}</span>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="rounded-[2rem] border border-dashed border-white/15 px-8 py-14 text-center text-slate-400">Belum ada skills yang ditambahkan.</div>
        @endforelse
    </div>
</section>
@endsection
