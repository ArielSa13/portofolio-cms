@extends('public.layout')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Projects — ' . ($about->name ?? 'Portfolio'))

@section('content')

<style>
.proj-wrap { max-width:1280px; margin:0 auto; padding:72px 24px 64px; }

/* Breadcrumb */
.proj-bc { font-size:12px; color:#94a3b8; margin-bottom:44px; }
.proj-bc a { color:#94a3b8; text-decoration:none; }
.proj-bc a:hover { color:#4f46e5; }

/* Header */
.proj-eyebrow { font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:.1em; color:#6366f1; margin:0 0 12px; }
.proj-h1 { font-size:clamp(28px,4vw,46px); font-weight:800; color:#0f172a; line-height:1.18; margin:0 0 14px; }
.proj-lead { font-size:16px; color:#64748b; line-height:1.7; margin:0 0 52px; max-width:580px; }

/* ── Grid menggunakan CSS columns yang simpel ── */
.proj-grid {
    column-count: 1;
    column-gap: 20px;
}
@media(min-width:640px)  { .proj-grid { column-count: 2; } }
@media(min-width:1024px) { .proj-grid { column-count: 3; } }

/* Card */
.proj-card {
    /* display inline-block agar column layout bekerja */
    display: inline-block;
    width: 100%;
    margin-bottom: 20px;
    /* Penting: break-inside prevent card terpotong */
    break-inside: avoid;
    -webkit-column-break-inside: avoid;
    page-break-inside: avoid;

    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: 16px;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    vertical-align: top;
    box-sizing: border-box;
    transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
}
.proj-card:hover {
    transform: translateY(-4px);
    border-color: #a5b4fc;
    box-shadow: 0 10px 32px rgba(99,102,241,.12);
}

/* Gambar — SELALU di atas, lebar penuh */
.proj-img-box {
    width: 100%;
    height: 190px;
    overflow: hidden;
    background: #f1f5f9;
    display: block;  /* block = tidak inline dengan konten */
    line-height: 0;  /* hilangkan gap bawah gambar */
}
.proj-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .4s ease;
}
.proj-card:hover .proj-img-box img { transform: scale(1.04); }

/* Placeholder jika tidak ada gambar */
.proj-img-placeholder {
    width: 100%;
    height: 190px;
    display: block;
    background: linear-gradient(135deg, #eef2ff 0%, #f8fafc 60%, #f5f3ff 100%);
    padding: 0 18px 18px;
    box-sizing: border-box;
    position: relative;
}
.proj-img-placeholder .ph-inner {
    position: absolute;
    bottom: 18px;
    left: 18px;
    right: 18px;
}
.proj-img-placeholder .ph-cat {
    font-size:10px; font-weight:700; text-transform:uppercase;
    letter-spacing:.09em; color:#a5b4fc; display:block; margin-bottom:4px;
}
.proj-img-placeholder .ph-title {
    font-size:16px; font-weight:800; color:#1e293b;
    line-height:1.3; display:block;
    overflow:hidden; max-height:42px;
}

/* Body */
.proj-body {
    display: block;
    padding: 16px 18px 18px;
    box-sizing: border-box;
}

/* Meta row: kategori + badge */
.proj-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 9px;
}
.proj-cat {
    font-size:10px; font-weight:700; text-transform:uppercase;
    letter-spacing:.08em; color:#94a3b8;
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
}
.proj-badge {
    font-size:9px; font-weight:700; text-transform:uppercase;
    letter-spacing:.06em; color:#4f46e5; background:#eef2ff;
    border:1px solid #c7d2fe; padding:2px 8px; border-radius:99px;
    white-space:nowrap; flex-shrink:0;
}

/* Judul */
.proj-title {
    font-size:15px; font-weight:800; color:#1e293b;
    line-height:1.35; margin:0 0 8px; display:block;
    overflow:hidden; max-height:40px; /* max 2 baris */
    transition: color .18s;
}
.proj-card:hover .proj-title { color:#4f46e5; }

/* Deskripsi — 3 baris fixed */
.proj-desc {
    font-size:13px; color:#64748b; line-height:1.6;
    margin:0 0 12px; display:block;
    overflow:hidden;
    /* 3 baris = 13px * 1.6 * 3 = 62.4px */
    height:63px;
}

/* Tech tags */
.proj-tags { display:flex; flex-wrap:wrap; gap:4px; margin-bottom:14px; min-height:22px; }
.proj-tag {
    font-size:10px; font-weight:600; color:#64748b;
    background:#f8fafc; border:1px solid #e2e8f0;
    padding:2px 7px; border-radius:5px; white-space:nowrap;
}

/* Footer */
.proj-footer {
    display:flex; align-items:center; justify-content:space-between;
    gap:8px; padding-top:12px; border-top:1px solid #f1f5f9;
}
.proj-cta {
    display:inline-flex; align-items:center; gap:4px;
    font-size:12px; font-weight:700; color:#6366f1;
    white-space:nowrap;
}
.proj-card:hover .proj-cta { color:#4338ca; }
.proj-links { display:flex; align-items:center; gap:4px; }
.proj-link {
    font-size:10px; font-weight:600; color:#94a3b8;
    border:1px solid #e2e8f0; border-radius:6px;
    padding:3px 8px; background:#fff; text-decoration:none;
}
.proj-link:hover { color:#4f46e5; border-color:#c7d2fe; background:#eef2ff; }

/* Empty */
.proj-empty {
    background:#fff; border:2px dashed #e2e8f0; border-radius:16px;
    padding:72px 24px; text-align:center;
}
</style>

<div class="proj-wrap">

    {{-- Breadcrumb --}}
    <p class="proj-bc">
        <a href="{{ route('home') }}">Home</a>
        <span style="margin:0 4px">›</span>
        <span>Projects</span>
    </p>

    {{-- Header --}}
    <p class="proj-eyebrow">Portfolio</p>
    <h1 class="proj-h1">Projects saya</h1>
    <p class="proj-lead">Setiap project menunjukkan cara saya menyusun fitur, memilih stack, dan membangun sistem yang terstruktur dan maintainable.</p>

    {{-- Grid --}}
    @if ($projects->count() > 0)
    <div class="proj-grid">
        @foreach ($projects as $project)
        <a href="{{ route('projects.show', $project) }}" class="proj-card">

            {{-- Gambar / Placeholder --}}
            @if ($project->cover_image)
                <span class="proj-img-box">
                    <img src="{{ asset($project->cover_image) }}" alt="{{ $project->title }}">
                </span>
            @else
                <span class="proj-img-placeholder">
                    <span class="ph-inner">
                        <span class="ph-cat">{{ $project->category ?: 'Project' }}</span>
                        <span class="ph-title">{{ $project->title }}</span>
                    </span>
                </span>
            @endif

            {{-- Body --}}
            <span class="proj-body">

                {{-- Meta --}}
                <span class="proj-meta">
                    <span class="proj-cat">{{ $project->category ?: 'Project' }}</span>
                    @if ($project->is_featured)
                        <span class="proj-badge">Featured</span>
                    @endif
                </span>

                {{-- Judul --}}
                <span class="proj-title">{{ $project->title }}</span>

                {{-- Deskripsi --}}
                <span class="proj-desc">{{ $project->description }}</span>

                {{-- Tech tags --}}
                <span class="proj-tags">
                    @if ($project->tech_stack)
                        @foreach (array_slice(explode(',', $project->tech_stack), 0, 4) as $tech)
                            <span class="proj-tag">{{ trim($tech) }}</span>
                        @endforeach
                    @endif
                </span>

                {{-- Footer --}}
                <span class="proj-footer">
                    <span class="proj-cta">
                        Lihat Detail
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                        </svg>
                    </span>
                    <span class="proj-links" onclick="event.preventDefault()">
                        @if ($project->demo_url)
                            <a href="{{ $project->demo_url }}" target="_blank" class="proj-link">Demo</a>
                        @endif
                        @if ($project->repo_url)
                            <a href="{{ $project->repo_url }}" target="_blank" class="proj-link">Repo</a>
                        @endif
                    </span>
                </span>

            </span>
        </a>
        @endforeach
    </div>
    @else
    <div class="proj-empty">
        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="#cbd5e1" stroke-width="1.5" style="margin:0 auto 12px;display:block;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"/>
        </svg>
        <p style="font-size:15px;font-weight:700;color:#475569;margin:0 0 4px;">Belum ada project yang dipublikasikan</p>
        <p style="font-size:13px;color:#94a3b8;margin:0;">Tambahkan dari admin panel.</p>
    </div>
    @endif

    {{-- Pagination --}}
    @if ($projects->hasPages())
        <div style="margin-top:40px;text-align:center;">
            {{ $projects->links() }}
        </div>
    @endif

</div>

@endsection
