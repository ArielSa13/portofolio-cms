<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Portfolio'))</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    <div class="pointer-events-none fixed inset-0 overflow-hidden">
        <div class="absolute left-1/2 top-0 h-[34rem] w-[34rem] -translate-x-1/2 rounded-full bg-cyan-500/12 blur-3xl"></div>
        <div class="absolute -left-24 top-56 h-80 w-80 rounded-full bg-fuchsia-500/10 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-indigo-500/10 blur-3xl"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.08),transparent_30%),linear-gradient(to_bottom,rgba(15,23,42,0.95),rgba(2,6,23,1))]"></div>
    </div>

    <div class="relative min-h-screen">
        <header class="sticky top-0 z-50 border-b border-white/10 bg-slate-950/75 backdrop-blur-xl">
            <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between gap-4">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div>
                            <p class="text-sm font-semibold tracking-[0.25em] text-white sm:text-base">PORTFOLIO</p>
                        </div>
                    </a>

                    {{-- Desktop Nav --}}
                    <nav class="hidden items-center gap-6 text-sm text-slate-300 lg:flex">
                        <a href="{{ route('home') }}" class="transition hover:text-white">Home</a>
                        <a href="{{ route('about') }}" class="transition hover:text-white">About</a>
                        <a href="{{ route('projects') }}" class="transition hover:text-white">Projects</a>
                        <a href="{{ route('experiences') }}" class="transition hover:text-white">Experience</a>
                        <a href="{{ route('contact') }}" class="transition hover:text-white">Contact</a>
                    </nav>

                    {{-- Desktop Actions --}}
                    {{-- <div class="hidden items-center gap-3 lg:flex">
                        <a href="{{ route('contact') }}"
                           class="rounded-full border border-white/15 px-5 py-2.5 text-sm font-medium text-slate-200 transition hover:border-white/30 hover:text-white">
                            Open to Opportunities
                        </a>

                        @if (Route::has('login'))
                            <a href="{{ route('login') }}"
                               class="rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-slate-200">
                                Admin
                            </a>
                        @endif
                    </div> --}}

                    {{-- Mobile Menu Button --}}
                    <button
                        id="mobile-menu-button"
                        type="button"
                        class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-slate-200 transition hover:bg-white/10 lg:hidden"
                        aria-label="Toggle navigation"
                        aria-expanded="false"
                        aria-controls="mobile-menu"
                    >
                        <svg id="menu-open-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                        <svg id="menu-close-icon" xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Mobile Menu --}}
                <div id="mobile-menu" class="hidden lg:hidden">
                    <div class="mt-4 rounded-[1.75rem] border border-white/10 bg-slate-900/90 p-4 shadow-2xl backdrop-blur-xl">
                        <nav class="flex flex-col gap-2 text-sm text-slate-200">
                            <a href="{{ route('home') }}" class="rounded-xl px-4 py-3 transition hover:bg-white/5 hover:text-white">Home</a>
                            <a href="{{ route('about') }}" class="rounded-xl px-4 py-3 transition hover:bg-white/5 hover:text-white">About</a>
                            <a href="{{ route('projects') }}" class="rounded-xl px-4 py-3 transition hover:bg-white/5 hover:text-white">Projects</a>
                            <a href="{{ route('experiences') }}" class="rounded-xl px-4 py-3 transition hover:bg-white/5 hover:text-white">Experience</a>
                            <a href="{{ route('contact') }}" class="rounded-xl px-4 py-3 transition hover:bg-white/5 hover:text-white">Contact</a>
                        </nav>

                        {{-- <div class="mt-4 grid gap-3 sm:grid-cols-2">
                            <a href="{{ route('contact') }}"
                               class="inline-flex items-center justify-center rounded-full border border-white/15 px-5 py-3 text-sm font-medium text-slate-200 transition hover:border-white/30 hover:bg-white/5 hover:text-white">
                                Open to Opportunities
                            </a>

                            @if (Route::has('login'))
                                <a href="{{ route('login') }}"
                                   class="inline-flex items-center justify-center rounded-full bg-white px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-slate-200">
                                    Admin
                                </a>
                            @endif
                        </div> --}}
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="border-t border-white/10 bg-slate-950/80 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">

        <div class="grid gap-10 lg:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr]">

            {{-- BRAND --}}
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">
                    Career Portfolio
                </p>

                <h2 class="mt-4 text-2xl font-semibold tracking-tight text-white">
                    Portfolio profesional untuk menunjukkan skill, pengalaman, dan kesiapan kerja.
                </h2>

                <p class="mt-4 max-w-md leading-7 text-slate-400">
                    Website ini membantu recruiter dan hiring manager memahami kemampuan teknis, pengalaman kerja, dan cara saya menyelesaikan masalah secara praktis.
                </p>

                {{-- <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ asset('cv/cv-programmer.pdf') }}" target="_blank"
                       class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-slate-950 hover:bg-slate-200">
                        Download CV
                    </a>

                    <a href="{{ route('contact') }}"
                       class="rounded-full border border-white/15 px-4 py-2 text-sm font-medium text-white hover:border-white/30 hover:bg-white/10">
                        Contact Me
                    </a>
                </div> --}}
            </div>

            {{-- NAVIGATION --}}
            <div>
                <p class="text-sm font-semibold text-white">Navigation</p>

                <div class="mt-4 space-y-3 text-sm text-slate-400">
                    <a href="{{ route('home') }}" class="block transition hover:text-white">Home</a>
                    <a href="{{ route('about') }}" class="block transition hover:text-white">About</a>
                    <a href="{{ route('projects') }}" class="block transition hover:text-white">Projects</a>
                    <a href="{{ route('contact') }}" class="block transition hover:text-white">Contact</a>
                </div>
            </div>

            {{-- FOCUS --}}
            <div>
                <p class="text-sm font-semibold text-white">Focus Areas</p>

                <div class="mt-4 space-y-3 text-sm text-slate-400">
                    <p>IT Support</p>
                    <p>Web Development</p>
                    <p>Laravel Development</p>
                    <p>System & Network</p>
                </div>
            </div>

            {{-- CONTACT --}}
            <div>
                <p class="text-sm font-semibold text-white">Contact</p>

                <div class="mt-4 space-y-3 text-sm text-slate-400">
                    <p>{{ $about->email ?? 'email@example.com' }}</p>
                    <p>{{ $about->location ?? 'Indonesia' }}</p>

                    <a href="{{ route('contact') }}"
                       class="inline-block text-cyan-300 hover:text-white">
                        Send Message →
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- BOTTOM --}}
    <div class="border-t border-white/10 px-4 py-5 text-center text-xs tracking-[0.2em] text-slate-500 sm:px-6 lg:px-8">
        © {{ date('Y') }} {{ config('app.name', 'Portfolio') }} · Built with Laravel · Ready for work
    </div>
</footer>
    </div>

    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-open-icon');
        const closeIcon = document.getElementById('menu-close-icon');

        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', function () {
                const isHidden = mobileMenu.classList.contains('hidden');

                mobileMenu.classList.toggle('hidden');
                openIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
                menuButton.setAttribute('aria-expanded', isHidden ? 'true' : 'false');
            });
        }
    </script>
</body>
</html>