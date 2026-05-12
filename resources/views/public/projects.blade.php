@extends('public.layout')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Projects — ' . ($about->name ?? 'Portfolio'))

@section('content')

<style>
    .project-thumb {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
        background: #f1f5f9;
        flex-shrink: 0;
        transition: transform 0.4s ease;
    }
    .project-thumb-placeholder {
        width: 100%;
        height: 200px;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 20px;
        background: linear-gradient(135deg, #eef2ff 0%, #f8fafc 50%, #f5f3ff 100%);
    }
    .project-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: all 0.25s ease;
        box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        text-decoration: none;
        color: inherit;
        height: 100%;
    }
    .project-card:hover {
        border-color: #a5b4fc;
        box-shadow: 0 8px 30px rgba(99,102,241,0.12), 0 2px 8px rgba(0,0,0,0.06);
        transform: translateY(-4px);
    }
    .project-card:hover .project-thumb {
        transform: scale(1.04);
    }
    .project-card-body {
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 20px;
        gap: 12px;
    }
    .project-card-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }
    .project-card-category {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #94a3b8;
    }
    .project-card-badge {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #4f46e5;
        background: #eef2ff;
        border: 1px solid #c7d2fe;
        padding: 3px 10px;
        border-radius: 999px;
        white-space: nowrap;
    }
    .project-card-title {
        font-size: 17px;
        font-weight: 700;
        color: #1e293b;
        line-height: 1.4;
        margin: 0;
        transition: color 0.2s;
    }
    .project-card:hover .project-card-title {
        color: #4f46e5;
    }
    .project-card-desc {
        font-size: 13.5px;
        color: #64748b;
        line-height: 1.65;
        flex: 1;
        margin: 0;
    }
    .project-card-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-top: 4px;
    }
    .project-card-tag {
        font-size: 11px;
        font-weight: 600;
        color: #64748b;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 3px 9px;
        border-radius: 6px;
    }
    .project-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 14px;
        border-top: 1px solid #f1f5f9;
        margin-top: auto;
    }
    .project-card-cta {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 13px;
        font-weight: 700;
        color: #6366f1;
        transition: color 0.2s, gap 0.2s;
    }
    .project-card:hover .project-card-cta {
        color: #4338ca;
        gap: 8px;
    }
    .project-card-links {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .project-card-link {
        font-size: 11px;
        font-weight: 600;
        color: #94a3b8;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 4px 10px;
        transition: all 0.2s;
        background: #fff;
        text-decoration: none;
    }
    .project-card-link:hover {
        color: #4f46e5;
        border-color: #c7d2fe;
        background: #eef2ff;
    }
    .projects-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 768px) {
        .projects-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 1280px) {
        .projects-grid { grid-template-columns: repeat(3, 1fr); }
    }
</style>

<section style="max-width:1280px; margin:0 auto; padding: 80px 24px 48px;">

    {{-- Breadcrumb --}}
    <div style="display:flex; align-items:center; gap:6px; font-size:12px; color:#94a3b8; margin-bottom:48px;">
        <a href="{{ route('home') }}" style="color:#94a3b8; text-decoration:none;" onmouseover="this.style.color='#4f46e5'" onmouseout="this.style.color='#94a3b8'">Home</a>
        <span>/</span>
        <span style="color:#64748b;">Projects</span>
    </div>

    {{-- Header --}}
    <div style="max-width:640px; margin-bottom:56px;">
        <p style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:#6366f1; margin-bottom:14px;">Portfolio</p>
        <h1 style="font-size:clamp(32px,5vw,52px); font-weight:800; color:#0f172a; line-height:1.15; letter-spacing:-0.02em; margin:0 0 18px;">
            Projects saya
        </h1>
        <p style="font-size:17px; color:#64748b; line-height:1.7; margin:0;">
            Setiap project menunjukkan cara saya menyusun fitur, memilih stack, dan membangun sistem yang terstruktur dan maintainable.
        </p>
    </div>

    {{-- Grid --}}
    <div class="projects-grid">
        @forelse ($projects as $project)
            <a href="{{ route('projects.show', $project) }}" class="project-card">

                {{-- Thumbnail --}}
                @if ($project->cover_image)
                    <div style="overflow:hidden; flex-shrink:0;">
                        <img src="{{ asset($project->cover_image) }}"
                             alt="{{ $project->title }}"
                             class="project-thumb">
                    </div>
                @else
                    <div class="project-thumb-placeholder">
                        <p style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#a5b4fc; margin:0 0 6px;">
                            {{ $project->category ?: 'Project' }}
                        </p>
                        <p style="font-size:18px; font-weight:800; color:#1e293b; margin:0; line-height:1.3;">
                            {{ $project->title }}
                        </p>
                    </div>
                @endif

                {{-- Body --}}
                <div class="project-card-body">

                    {{-- Meta: category + badge --}}
                    <div class="project-card-meta">
                        <span class="project-card-category">{{ $project->category ?: 'Project' }}</span>
                        @if ($project->is_featured)
                            <span class="project-card-badge">Featured</span>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h2 class="project-card-title">{{ $project->title }}</h2>

                    {{-- Description --}}
                    <p class="project-card-desc">{{ Str::limit($project->description, 115) }}</p>

                    {{-- Tech tags --}}
                    @if ($project->tech_stack)
                        <div class="project-card-tags">
                            @foreach (array_slice(explode(',', $project->tech_stack), 0, 4) as $tech)
                                <span class="project-card-tag">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    @endif

                    {{-- Footer: CTA + links --}}
                    <div class="project-card-footer">
                        <span class="project-card-cta">
                            Lihat Detail
                            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </span>
                        <div class="project-card-links" onclick="event.preventDefault()">
                            @if ($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" class="project-card-link">Demo</a>
                            @endif
                            @if ($project->repo_url)
                                <a href="{{ $project->repo_url }}" target="_blank" class="project-card-link">Repo</a>
                            @endif
                        </div>
                    </div>

                </div>
            </a>
        @empty
            <div style="grid-column:1/-1; background:#fff; border:2px dashed #e2e8f0; border-radius:16px; padding:80px 32px; text-align:center;">
                <div style="width:56px; height:56px; background:#f8fafc; border:1px solid #e2e8f0; border-radius:14px; display:flex; align-items:center; justify-content:center; margin:0 auto 16px;">
                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#94a3b8" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"/>
                    </svg>
                </div>
                <p style="font-size:15px; font-weight:600; color:#64748b; margin:0 0 4px;">Belum ada project yang dipublikasikan</p>
                <p style="font-size:13px; color:#94a3b8; margin:0;">Tambahkan dari admin panel.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if ($projects->hasPages())
        <div style="margin-top:48px; display:flex; justify-content:center;">
            {{ $projects->links() }}
        </div>
    @endif

</section>

@endsection
