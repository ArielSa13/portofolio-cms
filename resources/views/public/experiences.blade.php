@extends('public.layout')

@section('title', 'Experience | Portfolio')

@section('content')
<section class="mx-auto max-w-6xl px-6 py-20 lg:px-8">
    <div class="max-w-3xl">
        <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">Experience</p>
        <h1 class="mt-4 text-5xl font-semibold tracking-tight text-white lg:text-6xl">A timeline of learning, work, and technical growth.</h1>
        <p class="mt-6 text-lg leading-8 text-slate-300">Halaman ini merangkum pengalaman yang relevan untuk menunjukkan perkembangan, tanggung jawab, dan konteks kerja saya.</p>
    </div>

    <div class="mt-14 space-y-6">
        @forelse ($experiences as $experience)
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8">
                <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                    <div>
                        <h2 class="text-2xl font-semibold text-white">{{ $experience->position }}</h2>
                        <p class="mt-2 text-sm uppercase tracking-[0.25em] text-slate-500">{{ $experience->company }}</p>
                    </div>
                    <p class="text-sm text-slate-400">{{ optional($experience->start_date)->format('M Y') ?? '-' }}{{ $experience->end_date ? ' — '.optional($experience->end_date)->format('M Y') : ' — Present' }}</p>
                </div>
                <p class="mt-6 leading-8 text-slate-300">{{ $experience->description }}</p>
            </div>
        @empty
            <div class="rounded-[2rem] border border-dashed border-white/15 px-8 py-14 text-center text-slate-400">Belum ada pengalaman yang ditambahkan.</div>
        @endforelse
    </div>
</section>
@endsection
