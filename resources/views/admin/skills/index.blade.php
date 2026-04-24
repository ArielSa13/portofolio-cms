@extends('admin.layout')
@section('title', 'Skills')
@section('heading', 'Skills')
@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="text-sm text-slate-500">Kelola data skills dari panel admin.</div>
    <a href="{{ route('admin.skills.create') }}" class="rounded-xl bg-slate-900 px-4 py-2 text-sm font-medium text-white">Tambah Skill</a>
</div>
<div class="overflow-hidden rounded-3xl border border-slate-200 bg-white">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50"><tr><th class="px-6 py-3 text-left font-semibold text-slate-500">Nama</th><th class="px-6 py-3 text-left font-semibold text-slate-500">Kategori</th><th class="px-6 py-3 text-left font-semibold text-slate-500">Level</th><th class="px-6 py-3 text-left font-semibold text-slate-500">Aksi</th></tr></thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($skills as $skill)
                    <tr><td class="px-6 py-4 font-medium text-slate-900">{{ $skill->name }}</td><td class="px-6 py-4 text-slate-600">{{ $skill->category ?: "-" }}</td><td class="px-6 py-4 text-slate-600">{{ $skill->level ?: "-" }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="text-slate-700 hover:underline">Edit</a>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="20" class="px-6 py-8 text-center text-slate-500">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-6">{{ $skills->links() }}</div>
@endsection
