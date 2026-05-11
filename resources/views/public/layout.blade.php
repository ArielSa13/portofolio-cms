<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Portfolio'))</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-display { font-family: 'Sora', sans-serif; }

        /* Noise texture overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: 0.4;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #020617; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: #475569; }

        /* Nav active underline */
        .nav-link { position: relative; }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px; left: 50%;
            width: 0; height: 1.5px;
            background: linear-gradient(90deg, #22d3ee, #818cf8);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-link:hover::after,
        .nav-link.active::after { width: 100%; }
        .nav-link.active { color: white; }

        /* Glow button */
        .btn-primary {
            background: white;
            color: #0f172a;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(34,211,238,0.15), rgba(129,140,248,0.15));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .btn-primary:hover::before { opacity: 1; }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 8px 30px rgba(255,255,255,0.15); }

        /* Fade in animation */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeup { animation: fadeUp 0.6s ease forwards; }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #ffffff 0%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .gradient-text-accent {
            background: linear-gradient(135deg, #22d3ee 0%, #818cf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Card hover glow */
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            border-color: rgba(255,255,255,0.2);
            box-shadow: 0 0 0 1px rgba(34,211,238,0.1), 0 20px 50px rgba(0,0,0,0.4);
            transform: translateY(-3px);
        }
    </style>
</head>
<body class="min-h-screen bg-[#030712] text-slate-100 antialiased">

    {{-- Background ambience --}}
    <div class="pointer-events-none fixed inset-0 overflow-hidden z-0">
        <div class="absolute left-[20%] top-[-10%] h-[600px] w-[600px] rounded-full bg-cyan-600/8 blur-[100px]"></div>
        <div class="absolute right-[-5%] top-[30%] h-[400px] w-[400px] rounded-full bg-violet-600/8 blur-[100px]"></div>
        <div class="absolute bottom-[-10%] left-[10%] h-[500px] w-[500px] rounded-full bg-indigo-600/6 blur-[120px]"></div>
        <div class="absolute inset-0" style="background: radial-gradient(ellipse 80% 50% at 50% -10%, rgba(34,211,238,0.05) 0%, transparent 60%)"></div>
    </div>

    <div class="relative z-10 min-h-screen flex flex-col">

        {{-- NAVBAR --}}
        <header id="navbar" class="sticky top-0 z-50 transition-all duration-300">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between gap-4 border-b border-transparent transition-all duration-300" id="nav-inner">

                    {{-- Logo --}}
                    <a href="{{ route('home') }}" class="group flex items-center gap-2.5">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-cyan-400 to-violet-500 shadow-lg shadow-cyan-500/20">
                            <span class="text-xs font-bold text-white">
                                {{ strtoupper(substr($about->name ?? 'P', 0, 1)) }}
                            </span>
                        </div>
                        <span class="text-sm font-semibold tracking-wide text-white/90 group-hover:text-white transition-colors">
                            {{ $about->name ?? 'Portfolio' }}
                        </span>
                    </a>

                    {{-- Desktop Nav --}}
                    <nav class="hidden items-center gap-1 lg:flex">
                        @php
                            $navLinks = [
                                ['route' => 'home', 'label' => 'Home'],
                                ['route' => 'about', 'label' => 'About'],
                                ['route' => 'projects', 'label' => 'Projects'],
                                ['route' => 'experiences', 'label' => 'Experience'],
                                ['route' => 'contact', 'label' => 'Contact'],
                            ];
                        @endphp
                        @foreach ($navLinks as $link)
                            <a href="{{ route($link['route']) }}"
                               class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200 {{ request()->routeIs($link['route']) ? 'active text-white bg-white/5' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                                {{ $link['label'] }}
                            </a>
                        @endforeach
                    </nav>

                    {{-- CTA + Mobile button --}}
                    <div class="flex items-center gap-3">
                        <a href="{{ route('contact') }}"
                           class="hidden lg:inline-flex items-center gap-2 rounded-full bg-white/10 border border-white/10 px-4 py-2 text-sm font-medium text-white transition-all hover:bg-white/15 hover:border-white/20 backdrop-blur-sm">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            Available
                        </a>

                        {{-- Mobile toggle --}}
                        <button id="mobile-menu-button" type="button"
                            class="lg:hidden flex h-9 w-9 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-300 transition hover:bg-white/10"
                            aria-label="Toggle navigation" aria-expanded="false">
                            <svg id="menu-open-icon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg id="menu-close-icon" xmlns="http://www.w3.org/2000/svg" class="hidden h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobile-menu" class="hidden lg:hidden border-t border-white/10 bg-[#030712]/95 backdrop-blur-xl">
                <div class="mx-auto max-w-7xl px-4 py-4 space-y-1">
                    @foreach ($navLinks as $link)
                        <a href="{{ route($link['route']) }}"
                           class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition-colors {{ request()->routeIs($link['route']) ? 'bg-white/8 text-white' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                    <div class="pt-2 border-t border-white/5 mt-2">
                        <a href="{{ route('contact') }}" class="flex items-center gap-2 rounded-xl px-4 py-3 text-sm font-medium text-emerald-300 hover:bg-white/5">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            Open to Opportunities
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>

        {{-- FOOTER --}}
        <footer class="relative border-t border-white/8 mt-20">
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent pointer-events-none"></div>
            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
                <div class="grid gap-12 lg:grid-cols-[1.5fr_1fr_1fr_1fr]">

                    {{-- Brand --}}
                    <div>
                        <div class="flex items-center gap-2.5 mb-5">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-cyan-400 to-violet-500">
                                <span class="text-xs font-bold text-white">{{ strtoupper(substr($about->name ?? 'P', 0, 1)) }}</span>
                            </div>
                            <span class="text-sm font-semibold text-white">{{ $about->name ?? 'Portfolio' }}</span>
                        </div>
                        <p class="text-sm leading-7 text-slate-400 max-w-xs">
                            IT Support & Laravel Developer yang berfokus pada sistem yang stabil, maintainable, dan siap pakai.
                        </p>
                        <div class="mt-6 flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="text-xs text-emerald-300 font-medium">Available for work</span>
                        </div>
                    </div>

                    {{-- Nav --}}
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-500 mb-4">Navigation</p>
                        <ul class="space-y-3">
                            @foreach ($navLinks as $link)
                                <li><a href="{{ route($link['route']) }}" class="text-sm text-slate-400 hover:text-white transition-colors">{{ $link['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Focus --}}
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-500 mb-4">Focus Areas</p>
                        <ul class="space-y-3 text-sm text-slate-400">
                            <li>IT Support</li>
                            <li>Web Development</li>
                            <li>Laravel & PHP</li>
                            <li>Linux & Networking</li>
                        </ul>
                    </div>

                    {{-- Contact --}}
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-widest text-slate-500 mb-4">Contact</p>
                        <ul class="space-y-3 text-sm text-slate-400">
                            <li>{{ $about->email ?? 'email@example.com' }}</li>
                            <li>{{ $about->location ?? 'Indonesia' }}</li>
                            <li class="pt-1">
                                <a href="{{ route('contact') }}" class="inline-flex items-center gap-1.5 text-cyan-400 hover:text-cyan-300 transition-colors font-medium">
                                    Hubungi Saya
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-12 pt-6 border-t border-white/8 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-xs text-slate-500">© {{ date('Y') }} {{ $about->name ?? config('app.name') }}. Built with Laravel.</p>
                    <p class="text-xs text-slate-600">Ready for work · Open to opportunities</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        const navInner = document.getElementById('nav-inner');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('bg-[#030712]/90', 'backdrop-blur-xl', 'border-b', 'border-white/8', 'shadow-xl', 'shadow-black/20');
                navInner.classList.remove('border-transparent');
            } else {
                navbar.classList.remove('bg-[#030712]/90', 'backdrop-blur-xl', 'border-b', 'border-white/8', 'shadow-xl', 'shadow-black/20');
                navInner.classList.add('border-transparent');
            }
        });

        // Mobile menu toggle
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
