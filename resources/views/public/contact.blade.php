@extends('public.layout')

@section('title', 'Contact — ' . ($about->name ?? 'Portfolio'))

@section('content')

<section class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 pt-20 pb-24">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-xs text-slate-600 mb-12">
        <a href="{{ route('home') }}" class="hover:text-slate-400 transition-colors">Home</a>
        <span>/</span>
        <span class="text-slate-400">Contact</span>
    </div>

    {{-- Header --}}
    <div class="max-w-2xl mb-16">
        <div class="inline-flex items-center gap-2 rounded-full border border-emerald-400/20 bg-emerald-400/8 px-4 py-2 mb-6">
            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span class="text-xs font-medium text-emerald-300">Open to new opportunities</span>
        </div>
        <p class="text-xs font-semibold uppercase tracking-widest text-cyan-500 mb-4">Get In Touch</p>
        <h1 class="font-display text-4xl font-bold tracking-tight text-white sm:text-5xl">
            Tertarik bekerja sama?
        </h1>
        <p class="mt-5 text-lg leading-8 text-slate-400">
            Jika Anda sedang mencari IT Support atau Web Developer untuk posisi full-time, freelance, atau project tertentu — saya senang berdiskusi.
        </p>
    </div>

    <div class="grid gap-6 lg:grid-cols-[1fr_1.2fr]">

        {{-- LEFT: Contact Info --}}
        <div class="space-y-5">

            {{-- Main card --}}
            <div class="rounded-2xl border border-white/10 bg-white/3 p-7 backdrop-blur-sm">
                <p class="text-xs font-semibold uppercase tracking-widest text-slate-500 mb-6">Informasi Kontak</p>

                <div class="space-y-5">
                    @php
                        $contactItems = [
                            ['label' => 'Email', 'value' => $contact->email ?? $about->email ?? null, 'icon' => 'email', 'href' => 'mailto:'.($contact->email ?? $about->email ?? '#')],
                            ['label' => 'WhatsApp', 'value' => $contact->whatsapp ?? $about->whatsapp ?? null, 'icon' => 'phone', 'href' => 'https://wa.me/'.preg_replace('/[^0-9]/', '', $contact->whatsapp ?? $about->whatsapp ?? '')],
                            ['label' => 'LinkedIn', 'value' => $contact->linkedin ?? $about->linkedin ?? null, 'icon' => 'link', 'href' => $contact->linkedin ?? $about->linkedin ?? '#'],
                            ['label' => 'GitHub', 'value' => $contact->github ?? $about->github ?? null, 'icon' => 'code', 'href' => $contact->github ?? $about->github ?? '#'],
                            ['label' => 'Instagram', 'value' => $contact->instagram ?? $about->instagram ?? null, 'icon' => 'social', 'href' => $contact->instagram ?? $about->instagram ?? '#'],
                        ];
                    @endphp

                    @foreach ($contactItems as $item)
                        @if ($item['value'])
                            <a href="{{ $item['href'] }}"
                               target="{{ in_array($item['label'], ['LinkedIn', 'GitHub', 'Instagram', 'WhatsApp']) ? '_blank' : '_self' }}"
                               class="group flex items-center gap-4 rounded-xl border border-white/8 bg-white/3 p-4 transition-all hover:border-white/15 hover:bg-white/6">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/8 text-slate-400 group-hover:text-white transition-colors">
                                    @if ($item['icon'] == 'email')
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                                    @elseif ($item['icon'] == 'phone')
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                                    @else
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/></svg>
                                    @endif
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-xs text-slate-600 mb-0.5">{{ $item['label'] }}</p>
                                    <p class="text-sm font-medium text-slate-300 group-hover:text-white truncate transition-colors">{{ $item['value'] }}</p>
                                </div>
                                <svg class="h-4 w-4 text-slate-600 group-hover:text-slate-400 transition-all group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                </svg>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{-- RIGHT: Availability + CTA --}}
        <div class="space-y-5">

            {{-- Availability card --}}
            <div class="relative overflow-hidden rounded-2xl border border-white/10 bg-gradient-to-br from-cyan-500/8 via-violet-500/5 to-transparent p-7">
                <div class="absolute top-0 right-0 h-32 w-32 rounded-full bg-cyan-500/10 blur-2xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
                <div class="relative">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-xs font-semibold text-emerald-300 uppercase tracking-widest">Available</span>
                    </div>
                    <h2 class="font-display text-2xl font-bold text-white mb-3">Saya siap untuk peluang baru</h2>
                    <p class="text-slate-400 leading-7 text-sm">
                        {{ $contact->cta_text ?? 'Saat ini saya terbuka untuk posisi IT Support maupun Web Developer. Siap berdiskusi mengenai pengalaman, project, dan kontribusi yang bisa saya berikan.' }}
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="mailto:{{ $contact->email ?? $about->email ?? '#' }}"
                           class="inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition-all hover:bg-slate-100 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-white/10">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                            </svg>
                            Kirim Email
                        </a>
                        @if ($contact->whatsapp ?? $about->whatsapp ?? null)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp ?? $about->whatsapp) }}"
                               target="_blank"
                               class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-6 py-3 text-sm font-semibold text-white transition-all hover:bg-white/10 hover:border-white/25 hover:-translate-y-0.5">
                                WhatsApp
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- What I'm looking for --}}
            <div class="rounded-2xl border border-white/10 bg-white/3 p-7">
                <p class="text-xs font-semibold uppercase tracking-widest text-slate-500 mb-5">Tertarik untuk</p>
                <div class="space-y-3">
                    @foreach([
                        ['title' => 'Full-time Position', 'desc' => 'IT Support atau Web Developer', 'color' => 'emerald'],
                        ['title' => 'Freelance Project', 'desc' => 'Laravel web development', 'color' => 'cyan'],
                        ['title' => 'Internship', 'desc' => 'Pengalaman industri yang relevan', 'color' => 'violet'],
                    ] as $item)
                        <div class="flex items-center gap-4 rounded-xl border border-white/8 bg-white/3 px-4 py-3.5">
                            <div class="h-2 w-2 rounded-full bg-{{ $item['color'] }}-400 shrink-0"></div>
                            <div>
                                <p class="text-sm font-semibold text-white">{{ $item['title'] }}</p>
                                <p class="text-xs text-slate-500 mt-0.5">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
