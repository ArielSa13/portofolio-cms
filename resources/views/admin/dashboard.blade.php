@extends('admin.layout')

@section('title', 'Dashboard Admin')
@section('heading', 'Dashboard')

@section('content')
<div class="grid gap-4 md:grid-cols-2 xl:grid-cols-6">
    @foreach ([
        ['label' => 'Projects', 'value' => $projectCount],
        ['label' => 'Featured', 'value' => $featuredCount],
        ['label' => 'Services', 'value' => $serviceCount],
        ['label' => 'Skills', 'value' => $skillCount],
        ['label' => 'Testimonials', 'value' => $testimonialCount],
        ['label' => 'Experiences', 'value' => $experienceCount],
    ] as $card)
        <div class="rounded-3xl border border-slate-200 p-5">
            <p class="text-sm text-slate-500">{{ $card['label'] }}</p>
            <p class="mt-2 text-4xl font-bold text-slate-950">{{ $card['value'] }}</p>
        </div>
    @endforeach
</div>

<div class="mt-8 grid gap-8 lg:grid-cols-[1.4fr_1fr]">
    <div class="rounded-3xl border border-slate-200">
        <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
            <h2 class="text-lg font-semibold text-slate-900">Project Terbaru</h2>
            <a href="{{ route('admin.projects.create') }}" class="rounded-xl bg-slate-900 px-4 py-2 text-sm font-medium text-white">Tambah Project</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50"><tr><th class="px-6 py-3 text-left font-semibold text-slate-500">Judul</th><th class="px-6 py-3 text-left font-semibold text-slate-500">Kategori</th><th class="px-6 py-3 text-left font-semibold text-slate-500">Status</th><th class="px-6 py-3 text-left font-semibold text-slate-500">Tanggal</th></tr></thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse ($latestProjects as $project)
                        <tr>
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $project->title }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $project->category ?: '-' }}</td>
                            <td class="px-6 py-4"><span class="rounded-full px-3 py-1 text-xs {{ $project->status === 'published' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">{{ ucfirst($project->status) }}</span></td>
                            <td class="px-6 py-4 text-slate-600">{{ optional($project->published_at)->format('d M Y') ?: '-' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-6 text-center text-slate-500">Belum ada project.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="rounded-3xl border border-slate-200 p-6">
        <h2 class="text-lg font-semibold text-slate-900">Quick Actions</h2>
        <div class="mt-5 grid gap-3">
            <a href="{{ route('admin.about.edit') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Update About</a>
            <a href="{{ route('admin.projects.create') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Tambah Project</a>
            <a href="{{ route('admin.services.create') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Tambah Service</a>
            <a href="{{ route('admin.testimonials.create') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Tambah Testimonial</a>
            <a href="{{ route('admin.contact-settings.edit') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Atur Contact</a>
        </div>
    </div>
</div>
@endsection
