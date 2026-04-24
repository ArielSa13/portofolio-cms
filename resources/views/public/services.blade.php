@extends('public.layout')

@section('title', 'Focus Areas | Portfolio')

@section('content')
<section class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
    <div class="max-w-3xl">
        <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">Focus Areas</p>
        <h1 class="mt-4 text-5xl font-semibold tracking-tight text-white lg:text-6xl">What I focus on in web development.</h1>
        <p class="mt-6 text-lg leading-8 text-slate-300">Halaman ini menjelaskan area kerja utama yang saya bangun dan pelajari, sehingga recruiter bisa melihat kekuatan inti saya dengan cepat.</p>
    </div>

    <div class="mt-14 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($services as $service)
            <div class="group rounded-[2rem] border border-white/10 bg-white/5 p-6 transition hover:-translate-y-1 hover:border-white/20 hover:bg-white/10 hover:shadow-2xl">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-xl text-white">★</div>
                <h2 class="mt-6 text-2xl font-semibold text-white">{{ $service->title }}</h2>
                <p class="mt-4 text-sm leading-7 text-slate-300">{{ $service->description }}</p>
                <div class="mt-6 text-sm font-medium text-cyan-200">Relevant to my work →</div>
            </div>
        @empty
            <div class="col-span-full rounded-[2rem] border border-dashed border-white/15 px-8 py-14 text-center text-slate-400">
                Belum ada fokus area. Tambahkan dari admin panel.
            </div>
        @endforelse
    </div>
</section>
@endsection
