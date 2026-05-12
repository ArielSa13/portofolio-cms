@extends('public.layout')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Projects — ' . ($about->name ?? 'Portfolio'))

@section('content')

<style>
/* ─── Reset & base ─────────────────────────────────── */
* { box-sizing: border-box; }

/* ─── Page wrapper ─────────────────────────────────── */
.pg-projects {
    max-width: 1280px;
    margin: 0 auto;
    padding: 72px 24px 64px;
}

/* ─── Breadcrumb ───────────────────────────────────── */
.pg-bc {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    color: #94a3b8;
    margin-bottom: 44px;
}
.pg-bc a {
    color: #94a3b8;
    text-decoration: none;
    transition: color .2s;
}
.pg-bc a:hover { color: #4f46e5; }

/* ─── Page header ──────────────────────────────────── */
.pg-header {
    max-width: 600px;
    margin-bottom: 52px;
}
.pg-header-eyebrow {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .1em;
    color: #6366f1;
    margin: 0 0 12px;
}
.pg-header h1 {
    font-size: clamp(30px, 4.5vw, 48px);
    font-weight: 800;
    color: #0f172a;
    line-height: 1.18;
    letter-spacing: -.025em;
    margin: 0 0 16px;
}
.pg-header p {
    font-size: 16px;
    color: #64748b;
    line-height: 1.7;
    margin: 0;
}

/* ─── Grid ─────────────────────────────────────────── */
.pg-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    align-items: start;          /* ← kunci: card tidak stretch ke tinggi baris */
}
@media (min-width: 640px)  { .pg-grid { grid-template-columns: repeat(2, 1fr); } }
@media (min-width: 1024px) { .pg-grid { grid-template-columns: repeat(3, 1fr); } }

/* ─── Card ─────────────────────────────────────────── */
.pc {
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: 18px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    text-decoration: none;
    color: inherit;
    transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
    /* TIDAK pakai height:100% — card setinggi kontennya saja */
}
.pc:hover {
    transform: translateY(-5px);
    border-color: #a5b4fc;
    box-shadow: 0 12px 36px rgba(99,102,241,.13), 0 2px 8px rgba(0,0,0,.06);
}

/* ─── Thumbnail ────────────────────────────────────── */
.pc-thumb-wrap {
    position: relative;
    width: 100%;
    height: 196px;          /* ← tinggi tetap, semua card sama */
    overflow: hidden;
    flex-shrink: 0;
    background: #f1f5f9;
}
.pc-thumb-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .45s ease;
}
.pc:hover .pc-thumb-wrap img { transform: scale(1.05); }

/* Placeholder kalau tidak ada gambar */
.pc-thumb-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 18px 20px;
    background: linear-gradient(140deg, #eef2ff 0%, #f8fafc 55%, #f5f3ff 100%);
}
.pc-thumb-placeholder .pcat {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .09em;
    color: #a5b4fc;
    margin: 0 0 5px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.pc-thumb-placeholder .ptitle {
    font-size: 17px;
    font-weight: 800;
    color: #1e293b;
    line-height: 1.3;
    margin: 0;
    /* Batasi 2 baris */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* ─── Body ─────────────────────────────────────────── */
.pc-body {
    padding: 18px 20px 20px;
    display: flex;
    flex-direction: column;
    gap: 0;
}

/* Meta row */
.pc-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 10px;
    min-height: 22px;
}
.pc-cat {
    font-size: 10.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: #94a3b8;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.pc-badge {
    font-size: 9.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .06em;
    color: #4f46e5;
    background: #eef2ff;
    border: 1px solid #c7d2fe;
    padding: 2px 9px;
    border-radius: 999px;
    white-space: nowrap;
    flex-shrink: 0;
}

/* Title */
.pc-title {
    font-size: 16px;
    font-weight: 800;
    color: #1e293b;
    line-height: 1.38;
    margin: 0 0 8px;
    /* Batasi 2 baris agar semua card sama */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color .2s;
}
.pc:hover .pc-title { color: #4f46e5; }

/* Description — fix 3 baris */
.pc-desc {
    font-size: 13px;
    color: #64748b;
    line-height: 1.62;
    margin: 0 0 14px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    /* Tinggi tetap = 3 baris × line-height */
    min-height: calc(13px * 1.62 * 3);
}

/* Tech tags */
.pc-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    margin-bottom: 16px;
    min-height: 24px;    /* placeholder space kalau tidak ada tags */
}
.pc-tag {
    font-size: 10.5px;
    font-weight: 600;
    color: #64748b;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    padding: 3px 8px;
    border-radius: 6px;
    white-space: nowrap;
}

/* Footer */
.pc-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    padding-top: 14px;
    border-top: 1px solid #f1f5f9;
    margin-top: auto;
}
.pc-cta {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 12.5px;
    font-weight: 700;
    color: #6366f1;
    white-space: nowrap;
    transition: gap .2s, color .2s;
}
.pc:hover .pc-cta { color: #4338ca; gap: 7px; }

.pc-links {
    display: flex;
    align-items: center;
    gap: 5px;
}
.pc-link {
    font-size: 10.5px;
    font-weight: 600;
    color: #94a3b8;
    border: 1px solid #e2e8f0;
    border-radius: 7px;
    padding: 3px 9px;
    background: #fff;
    text-decoration: none;
    transition: all .18s;
    white-space: nowrap;
}
.pc-link:hover {
    color: #4f46e5;
    border-color: #c7d2fe;
    background: #eef2ff;
}

/* ─── Empty state ──────────────────────────────────── */
.pg-empty {
    grid-column: 1 / -1;
    background: #fff;
    border: 2px dashed #e2e8f0;
    border-radius: 18px;
    padding: 72px 32px;
    text-align: center;
}
.pg-empty-icon {
    width: 52px; height: 52px;
    background: #f8fafc;
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 14px;
}
</style>

<div class="pg-projects">

    {{-- Breadcrumb --}}
    <nav class="pg-bc">
        <a href="{{ route('home') }}">Home</a>
        <span>›</span>
        <span style="color:#64748b">Projects</span>
    </nav>

    {{-- Header --}}
    <div class="pg-header">
        <p class="pg-header-eyebrow">Portfolio</p>
        <h1>Projects saya</h1>
        <p>Setiap project menunjukkan cara saya menyusun fitur, memilih stack, dan membangun sistem yang terstruktur dan maintainable.</p>
    </div>

    {{-- Grid --}}
    <div class="pg-grid">
        @forelse ($projects as $project)

            <a href="{{ route('projects.show', $project) }}" class="pc">

                {{-- ── Thumbnail ── --}}
                <div class="pc-thumb-wrap">
                    @if ($project->cover_image)
                        <img src="{{ asset($project->cover_image) }}"
                             alt="{{ $project->title }}">
                    @else
                        <div class="pc-thumb-placeholder">
                            <p class="pcat">{{ $project->category ?: 'Project' }}</p>
                            <p class="ptitle">{{ $project->title }}</p>
                        </div>
                    @endif
                </div>

                {{-- ── Body ── --}}
                <div class="pc-body">

                    {{-- Meta --}}
                    <div class="pc-meta">
                        <span class="pc-cat">{{ $project->category ?: 'Project' }}</span>
                        @if ($project->is_featured)
                            <span class="pc-badge">Featured</span>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h2 class="pc-title">{{ $project->title }}</h2>

                    {{-- Desc --}}
                    <p class="pc-desc">{{ $project->description }}</p>

                    {{-- Tech tags --}}
                    <div class="pc-tags">
                        @if ($project->tech_stack)
                            @foreach (array_slice(explode(',', $project->tech_stack), 0, 4) as $tech)
                                <span class="pc-tag">{{ trim($tech) }}</span>
                            @endforeach
                        @endif
                    </div>

                    {{-- Footer --}}
                    <div class="pc-footer">
                        <span class="pc-cta">
                            Lihat Detail
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                            </svg>
                        </span>
                        <div class="pc-links" onclick="event.preventDefault()">
                            @if ($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" class="pc-link">Demo</a>
                            @endif
                            @if ($project->repo_url)
                                <a href="{{ $project->repo_url }}" target="_blank" class="pc-link">Repo</a>
                            @endif
                        </div>
                    </div>

                </div>
            </a>

        @empty
            <div class="pg-empty">
                <div class="pg-empty-icon">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="#94a3b8" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"/>
                    </svg>
                </div>
                <p style="font-size:15px;font-weight:700;color:#475569;margin:0 0 4px;">Belum ada project yang dipublikasikan</p>
                <p style="font-size:13px;color:#94a3b8;margin:0;">Tambahkan dari admin panel.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if ($projects->hasPages())
        <div style="margin-top:44px;display:flex;justify-content:center;">
            {{ $projects->links() }}
        </div>
    @endif

</div>

@endsection
