@extends('public.layout')

@section('title', 'Contact | Portfolio')

@section('content')
<section class="mx-auto max-w-5xl px-6 py-20 lg:px-8">
    <p class="text-sm uppercase tracking-[0.35em] text-slate-400">Contact</p>
    <h1 class="mt-4 text-5xl font-semibold tracking-tight text-white">Open for opportunities and professional conversations.</h1>
    <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-300">Jika Anda sedang mencari web developer untuk posisi full-time, internship, freelance, atau project tertentu, Anda bisa menghubungi saya melalui kontak di bawah ini.</p>

    <div class="mt-12 grid gap-6 lg:grid-cols-2">
        <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8">
            <h2 class="text-2xl font-semibold text-white">Contact Information</h2>
            <div class="mt-6 space-y-4 text-slate-300">
                <p><strong>Email:</strong> {{ $contact->email ?? $about->email ?? 'email@domain.com' }}</p>
                <p><strong>WhatsApp:</strong> {{ $contact->whatsapp ?? $about->whatsapp ?? '-' }}</p>
                <p><strong>LinkedIn:</strong> {{ $contact->linkedin ?? $about->linkedin ?? '-' }}</p>
                <p><strong>Instagram:</strong> {{ $contact->instagram ?? $about->instagram ?? '-' }}</p>
                <p><strong>GitHub:</strong> {{ $contact->github ?? $about->github ?? '-' }}</p>
            </div>
        </div>

        <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8">
            <h2 class="text-2xl font-semibold text-white">Availability</h2>
            <p class="mt-4 text-slate-300">{{ $contact->cta_text ?? 'Saat ini saya terbuka untuk peluang kerja sebagai web developer dan siap berdiskusi mengenai pengalaman, project, maupun kontribusi yang bisa saya berikan.' }}</p>
            <a href="mailto:{{ $contact->email ?? $about->email ?? 'email@domain.com' }}" class="mt-8 inline-flex rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950">Kirim Email</a>
        </div>
    </div>
</section>
@endsection
