@extends('admin.layout')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('content')

{{-- ═══════════════════════════════════════════════════════
     STATS GRID
═══════════════════════════════════════════════════════ --}}
@php
    $stats = [
        [
            'label'   => 'Total Projects',
            'value'   => $projectCount,
            'sub'     => $featuredCount . ' featured',
            'color'   => 'sky',
            'icon'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776"/>',
            'href'    => route('admin.projects.index'),
        ],
        [
            'label'   => 'Services',
            'value'   => $serviceCount,
            'sub'     => 'focus areas',
            'color'   => 'violet',
            'icon'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0"/>',
            'href'    => route('admin.services.index'),
        ],
        [
            'label'   => 'Skills',
            'value'   => $skillCount,
            'sub'     => 'technologies',
            'color'   => 'emerald',
            'icon'    => '<path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z"/>',
            'href'    => route('admin.skills.index'),
        ],
        [
            'label'   => 'Testimonials',
            'value'   => $testimonialCount,
            'sub'     => 'reviews',
            'color'   => 'amber',
            'icon'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/>',
            'href'    => route('admin.testimonials.index'),
        ],
        [
            'label'   => 'Experiences',
            'value'   => $experienceCount,
            'sub'     => 'work history',
            'color'   => 'rose',
            'icon'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>',
            'href'    => route('admin.experiences.index'),
        ],
        [
            'label'   => 'Featured',
            'value'   => $featuredCount,
            'sub'     => 'of ' . $projectCount . ' projects',
            'color'   => 'cyan',
            'icon'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/>',
            'href'    => route('admin.projects.index'),
        ],
    ];

    $colorMap = [
        'sky'    => ['bg' => 'bg-sky-50',    'border' => 'border-sky-100',    'icon' => 'bg-sky-100 text-sky-600',    'text' => 'text-sky-700'],
        'violet' => ['bg' => 'bg-violet-50', 'border' => 'border-violet-100', 'icon' => 'bg-violet-100 text-violet-600', 'text' => 'text-violet-700'],
        'emerald'=> ['bg' => 'bg-emerald-50','border' => 'border-emerald-100','icon' => 'bg-emerald-100 text-emerald-600','text' => 'text-emerald-700'],
        'amber'  => ['bg' => 'bg-amber-50',  'border' => 'border-amber-100',  'icon' => 'bg-amber-100 text-amber-600',  'text' => 'text-amber-700'],
        'rose'   => ['bg' => 'bg-rose-50',   'border' => 'border-rose-100',   'icon' => 'bg-rose-100 text-rose-600',   'text' => 'text-rose-700'],
        'cyan'   => ['bg' => 'bg-cyan-50',   'border' => 'border-cyan-100',   'icon' => 'bg-cyan-100 text-cyan-600',   'text' => 'text-cyan-700'],
    ];
@endphp

<div class="grid grid-cols-2 gap-4 sm:grid-cols-3 xl:grid-cols-6">
    @foreach ($stats as $stat)
        @php $c = $colorMap[$stat['color']]; @endphp
        <a href="{{ $stat['href'] }}"
           class="group flex flex-col rounded-2xl border {{ $c['border'] }} {{ $c['bg'] }} p-5 transition-all hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-center justify-between mb-4">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl {{ $c['icon'] }}">
                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        {!! $stat['icon'] !!}
                    </svg>
                </div>
                <svg class="h-3.5 w-3.5 text-slate-300 group-hover:text-slate-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </div>
            <p class="font-display text-3xl font-bold text-slate-900">{{ $stat['value'] }}</p>
            <p class="mt-1 text-xs font-semibold text-slate-700">{{ $stat['label'] }}</p>
            <p class="mt-0.5 text-[11px] {{ $c['text'] }}">{{ $stat['sub'] }}</p>
        </a>
    @endforeach
</div>

{{-- ═══════════════════════════════════════════════════════
     MAIN CONTENT GRID
═══════════════════════════════════════════════════════ --}}
<div class="mt-8 grid gap-6 lg:grid-cols-[1.5fr_1fr]">

    {{-- Latest Projects Table --}}
    <div class="rounded-2xl border border-slate-200 bg-white overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <div>
                <h2 class="font-display text-base font-bold text-slate-900">Project Terbaru</h2>
                <p class="text-xs text-slate-400 mt-0.5">{{ $projectCount }} total project</p>
            </div>
            <a href="{{ route('admin.projects.create') }}"
               class="inline-flex items-center gap-1.5 rounded-lg bg-slate-900 px-3.5 py-2 text-xs font-semibold text-white transition hover:bg-slate-700">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Tambah
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50/60">
                        <th class="px-6 py-3 text-left text-[11px] font-semibold uppercase tracking-widest text-slate-400">Judul</th>
                        <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-widest text-slate-400">Kategori</th>
                        <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-widest text-slate-400">Status</th>
                        <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-widest text-slate-400">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($latestProjects as $project)
                        <tr class="group hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                   class="font-semibold text-slate-800 group-hover:text-sky-600 transition-colors">
                                    {{ $project->title }}
                                </a>
                            </td>
                            <td class="px-4 py-4 text-slate-500">{{ $project->category ?: '—' }}</td>
                            <td class="px-4 py-4">
                                @if ($project->status === 'published')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 border border-emerald-100 px-2.5 py-1 text-[11px] font-semibold text-emerald-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 border border-amber-100 px-2.5 py-1 text-[11px] font-semibold text-amber-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-slate-400 text-xs">
                                {{ optional($project->published_at)->format('d M Y') ?: '—' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-400">
                                <svg class="mx-auto mb-3 h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776"/>
                                </svg>
                                Belum ada project.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($projectCount > 5)
            <div class="border-t border-slate-100 px-6 py-3">
                <a href="{{ route('admin.projects.index') }}" class="text-xs font-medium text-sky-600 hover:text-sky-800 transition-colors">
                    Lihat semua {{ $projectCount }} project →
                </a>
            </div>
        @endif
    </div>

    {{-- Quick Actions --}}
    <div class="space-y-5">

        {{-- Quick actions card --}}
        <div class="rounded-2xl border border-slate-200 bg-white overflow-hidden">
            <div class="border-b border-slate-100 px-6 py-4">
                <h2 class="font-display text-base font-bold text-slate-900">Quick Actions</h2>
                <p class="text-xs text-slate-400 mt-0.5">Akses cepat ke fungsi utama</p>
            </div>
            <div class="p-4 grid grid-cols-1 gap-2">
                @php
                    $quickActions = [
                        ['href' => route('admin.about.edit'),            'label' => 'Update About',        'desc' => 'Edit profil & bio', 'color' => 'violet'],
                        ['href' => route('admin.projects.create'),       'label' => 'Tambah Project',       'desc' => 'Tambah project baru', 'color' => 'sky'],
                        ['href' => route('admin.services.create'),       'label' => 'Tambah Service',       'desc' => 'Focus area baru', 'color' => 'emerald'],
                        ['href' => route('admin.experiences.create'),    'label' => 'Tambah Experience',    'desc' => 'Riwayat kerja baru', 'color' => 'amber'],
                        ['href' => route('admin.testimonials.create'),   'label' => 'Tambah Testimonial',   'desc' => 'Review baru', 'color' => 'rose'],
                        ['href' => route('admin.contact-settings.edit'), 'label' => 'Atur Contact',         'desc' => 'Info kontak & sosmed', 'color' => 'cyan'],
                    ];
                    $qaColors = [
                        'violet'  => 'text-violet-600 bg-violet-50',
                        'sky'     => 'text-sky-600 bg-sky-50',
                        'emerald' => 'text-emerald-600 bg-emerald-50',
                        'amber'   => 'text-amber-600 bg-amber-50',
                        'rose'    => 'text-rose-600 bg-rose-50',
                        'cyan'    => 'text-cyan-600 bg-cyan-50',
                    ];
                @endphp

                @foreach ($quickActions as $action)
                    <a href="{{ $action['href'] }}"
                       class="group flex items-center gap-3 rounded-xl border border-transparent px-4 py-3 transition-all hover:border-slate-200 hover:bg-slate-50">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg {{ $qaColors[$action['color']] }} transition-transform group-hover:scale-110">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-slate-800 group-hover:text-slate-900">{{ $action['label'] }}</p>
                            <p class="text-xs text-slate-400">{{ $action['desc'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Site status card --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6">
            <h2 class="font-display text-base font-bold text-slate-900 mb-4">Status Website</h2>
            <div class="space-y-3">
                <div class="flex items-center justify-between rounded-xl bg-slate-50 px-4 py-3">
                    <span class="text-sm text-slate-600">About page</span>
                    <span class="inline-flex items-center gap-1.5 text-xs font-medium text-emerald-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        Live
                    </span>
                </div>
                <div class="flex items-center justify-between rounded-xl bg-slate-50 px-4 py-3">
                    <span class="text-sm text-slate-600">Projects</span>
                    <span class="text-xs font-semibold text-slate-700">{{ $projectCount }} total</span>
                </div>
                <div class="flex items-center justify-between rounded-xl bg-slate-50 px-4 py-3">
                    <span class="text-sm text-slate-600">Published</span>
                    <span class="text-xs font-semibold text-sky-600">{{ $featuredCount }} featured</span>
                </div>
                <a href="{{ route('home') }}" target="_blank"
                   class="mt-1 flex items-center justify-center gap-2 rounded-xl border border-slate-200 px-4 py-3 text-sm font-semibold text-slate-700 transition-all hover:bg-slate-900 hover:text-white hover:border-slate-900">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                    </svg>
                    Buka Website
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
