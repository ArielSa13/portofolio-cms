@extends('public.layout')

@section('title', 'Testimonials | Portfolio')

@section('content')
<section class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
    <div class="max-w-3xl">
        <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">Testimonials</p>
        <h1 class="mt-4 text-5xl font-semibold tracking-tight text-white lg:text-6xl">Feedback on work quality and collaboration.</h1>
        <p class="mt-6 text-lg leading-8 text-slate-300">Testimoni membantu memberi konteks tambahan tentang cara saya bekerja, berkomunikasi, dan menyelesaikan project secara profesional.</p>
    </div>

    <div class="mt-14 grid gap-6 lg:grid-cols-3">
        @forelse ($testimonials as $testimonial)
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8">
                <p class="text-base leading-8 text-slate-200">“{{ $testimonial->message }}”</p>
                <div class="mt-6 border-t border-white/10 pt-5">
                    <p class="font-semibold text-white">{{ $testimonial->name }}</p>
                    <p class="mt-1 text-sm text-slate-400">{{ trim(($testimonial->role ? $testimonial->role.' · ' : '').($testimonial->company ?? '')) }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full rounded-[2rem] border border-dashed border-white/15 px-8 py-14 text-center text-slate-400">Belum ada testimoni yang dipublikasikan.</div>
        @endforelse
    </div>

    <div class="mt-10 text-slate-300">
        {{ $testimonials->links() }}
    </div>
</section>
@endsection
