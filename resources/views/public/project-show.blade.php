@extends('public.layout')

@php use Illuminate\Support\Str; @endphp

@section('title', $project->title . ' — ' . ($about->name ?? 'Portfolio'))

@section('content')

<style>
    .ps-section { max-width: 1280px; margin: 0 auto; padding: 80px 24px 48px; }
    .ps-breadcrumb { display:flex; align-items:center; gap:6px; font-size:12px; color:#94a3b8; margin-bottom:48px; }
    .ps-breadcrumb a { color:#94a3b8; text-decoration:none; }
    .ps-breadcrumb a:hover { color:#4f46e5; }

    /* Hero grid */
    .ps-hero { display:grid; gap:32px; align-items:start; }
    @media(min-width:1024px){ .ps-hero { grid-template-columns: 1fr 300px; } }

    /* Sidebar card */
    .ps-sidebar {
        background:#fff;
        border:1px solid #e2e8f0;
        border-radius:16px;
        padding:24px;
        box-shadow:0 1px 4px rgba(0,0,0,0.06);
    }
    .ps-sidebar-label { font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.09em; color:#94a3b8; margin:0 0 18px; }
    .ps-info-row { margin-bottom:18px; }
    .ps-info-row:last-of-type { margin-bottom:0; }
    .ps-info-key { font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#94a3b8; margin-bottom:6px; }
    .ps-info-val { font-size:14px; font-weight:600; color:#334155; }
    .ps-tags { display:flex; flex-wrap:wrap; gap:6px; }
    .ps-tag { font-size:12px; font-weight:600; color:#4f46e5; background:#eef2ff; border:1px solid #c7d2fe; padding:4px 12px; border-radius:999px; }
    .ps-divider { height:1px; background:#f1f5f9; margin:20px 0; }

    /* Buttons */
    .ps-btn-primary {
        display:flex; align-items:center; justify-content:center; gap:8px;
        background:linear-gradient(135deg,#4f46e5,#7c3aed);
        color:#fff; font-size:14px; font-weight:700;
        border:none; border-radius:12px; padding:12px 20px;
        text-decoration:none; cursor:pointer;
        transition:all 0.2s; width:100%;
        box-shadow:0 4px 12px rgba(99,102,241,0.3);
    }
    .ps-btn-primary:hover { transform:translateY(-1px); box-shadow:0 6px 20px rgba(99,102,241,0.4); }
    .ps-btn-secondary {
        display:flex; align-items:center; justify-content:center; gap:8px;
        background:#fff; color:#475569; font-size:14px; font-weight:700;
        border:1px solid #e2e8f0; border-radius:12px; padding:12px 20px;
        text-decoration:none; cursor:pointer;
        transition:all 0.2s; width:100%;
    }
    .ps-btn-secondary:hover { border-color:#a5b4fc; color:#4f46e5; background:#eef2ff; }

    /* Cover image */
    .ps-cover {
        border-radius:16px; overflow:hidden;
        border:1px solid #e2e8f0;
        background:#f1f5f9;
        margin-top:40px;
    }
    .ps-cover img { width:100%; display:block; max-height:480px; object-fit:cover; }
    .ps-cover-placeholder {
        min-height:280px; display:flex; align-items:flex-end; padding:32px;
        background:linear-gradient(135deg,#eef2ff 0%,#f8fafc 50%,#f5f3ff 100%);
    }

    /* Content area */
    .ps-content-grid { display:grid; gap:24px; margin-top:40px; }
    @media(min-width:1024px){ .ps-content-grid { grid-template-columns: 1fr 260px; } }

    .ps-article {
        background:#fff; border:1px solid #e2e8f0; border-radius:16px;
        padding:32px; box-shadow:0 1px 4px rgba(0,0,0,0.06);
        font-size:15px; color:#475569; line-height:1.8;
    }
    .ps-why {
        background:#fff; border:1px solid #e2e8f0; border-radius:16px;
        padding:24px; box-shadow:0 1px 4px rgba(0,0,0,0.06);
        align-self:start;
    }

    /* Related */
    .ps-related { max-width:1280px; margin:0 auto; padding:0 24px 80px; }
    .ps-related-grid { display:grid; gap:20px; }
    @media(min-width:768px){ .ps-related-grid { grid-template-columns:repeat(3,1fr); } }
    .ps-related-card {
        background:#fff; border:1px solid #e2e8f0; border-radius:16px;
        padding:22px; text-decoration:none; color:inherit;
        transition:all 0.22s; box-shadow:0 1px 3px rgba(0,0,0,0.05);
    }
    .ps-related-card:hover {
        border-color:#a5b4fc;
        box-shadow:0 6px 24px rgba(99,102,241,0.1);
        transform:translateY(-3px);
    }
</style>

<div class="ps-section">

    {{-- Breadcrumb --}}
    <div class="ps-breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <a href="{{ route('projects') }}">Projects</a>
        <span>/</span>
        <span style="color:#64748b;">{{ Str::limit($project->title, 35) }}</span>
    </div>

    {{-- Hero --}}
    <div class="ps-hero">

        {{-- Left: title + desc --}}
        <div>
            <p style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:#6366f1; margin:0 0 14px;">
                {{ $project->category ?: 'Project' }}
            </p>
            <h1 style="font-size:clamp(28px,4.5vw,46px); font-weight:800; color:#0f172a; line-height:1.2; letter-spacing:-0.02em; margin:0 0 20px;">
                {{ $project->title }}
            </h1>
            <p style="font-size:17px; color:#64748b; line-height:1.7; max-width:600px; margin:0;">
                {{ $project->description }}
            </p>
        </div>

        {{-- Right: sidebar --}}
        <div class="ps-sidebar">
            <p class="ps-sidebar-label">Quick Overview</p>

            <div class="ps-info-row">
                <p class="ps-info-key">Status</p>
                <p class="ps-info-val">
                    @if ($project->status === 'published')
                        <span style="display:inline-flex;align-items:center;gap:6px;">
                            <span style="width:7px;height:7px;background:#34d399;border-radius:50%;display:inline-block;"></span>
                            Published
                        </span>
                    @else
                        Draft
                    @endif
                </p>
            </div>

            @if ($project->published_at)
                <div class="ps-info-row">
                    <p class="ps-info-key">Published</p>
                    <p class="ps-info-val">{{ $project->published_at->format('d M Y') }}</p>
                </div>
            @endif

            @if (count($project->tech_list) > 0)
                <div class="ps-info-row">
                    <p class="ps-info-key">Tech Stack</p>
                    <div class="ps-tags">
                        @foreach ($project->tech_list as $tech)
                            <span class="ps-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($project->demo_url || $project->repo_url)
                <div class="ps-divider"></div>
                <div style="display:flex;flex-direction:column;gap:10px;">
                    @if ($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" class="ps-btn-primary">
                            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                            </svg>
                            Open Live Demo
                        </a>
                    @endif
                    @if ($project->repo_url)
                        <a href="{{ $project->repo_url }}" target="_blank" class="ps-btn-secondary">
                            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/>
                            </svg>
                            Open Repository
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

    {{-- Cover image --}}
    <div class="ps-cover">
        @if ($project->cover_image)
            <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }}">
        @else
            <div class="ps-cover-placeholder">
                <div>
                    <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;color:#a5b4fc;margin:0 0 10px;">Case Study</p>
                    <p style="font-size:clamp(20px,3vw,32px);font-weight:800;color:#1e293b;margin:0;line-height:1.3;max-width:500px;">
                        Project detail yang menjelaskan implementasi dan keputusan teknis.
                    </p>
                </div>
            </div>
        @endif
    </div>

    {{-- Content --}}
    <div class="ps-content-grid">
        <article class="ps-article">
            @if ($project->content)
                {!! nl2br(e($project->content)) !!}
            @else
                <p style="color:#94a3b8; font-style:italic;">Konten detail belum ditambahkan.</p>
            @endif
        </article>
        <aside class="ps-why">
            <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.09em;color:#94a3b8;margin:0 0 14px;">Why it matters</p>
            <h2 style="font-size:17px;font-weight:800;color:#1e293b;line-height:1.4;margin:0 0 12px;">
                Project sebagai bukti kemampuan teknis
            </h2>
            <p style="font-size:14px;color:#64748b;line-height:1.7;margin:0;">
                Halaman detail project membantu menjelaskan konteks, fitur, stack, dan keputusan implementasi sehingga karya Anda lebih mudah dinilai oleh recruiter atau hiring manager.
            </p>
        </aside>
    </div>

</div>

{{-- Related Projects --}}
@if ($relatedProjects->count() > 0)
<div class="ps-related">
    <div style="display:flex;align-items:flex-end;justify-content:space-between;gap:16px;margin-bottom:28px;">
        <div>
            <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.09em;color:#94a3b8;margin:0 0 8px;">Related Projects</p>
            <h2 style="font-size:24px;font-weight:800;color:#0f172a;margin:0;">Project lainnya</h2>
        </div>
        <a href="{{ route('projects') }}"
           style="font-size:13px;font-weight:700;color:#6366f1;text-decoration:none;white-space:nowrap;"
           onmouseover="this.style.color='#4338ca'" onmouseout="this.style.color='#6366f1'">
            Semua projects →
        </a>
    </div>
    <div class="ps-related-grid">
        @foreach ($relatedProjects as $related)
            <a href="{{ route('projects.show', $related) }}" class="ps-related-card">
                <p style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:0.09em;color:#94a3b8;margin:0 0 10px;">
                    {{ $related->category ?: 'Project' }}
                </p>
                <h3 style="font-size:16px;font-weight:800;color:#1e293b;margin:0 0 10px;line-height:1.35;">
                    {{ $related->title }}
                </h3>
                <p style="font-size:13px;color:#64748b;line-height:1.65;margin:0;">
                    {{ Str::limit($related->description, 90) }}
                </p>
            </a>
        @endforeach
    </div>
</div>
@endif

@endsection
