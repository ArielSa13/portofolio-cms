@extends('admin.layout')
@section('title', 'Edit About')
@section('heading', 'Edit About')
@section('content')
<form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @method('PUT')
    <div class="grid gap-6 md:grid-cols-2">
        <div class="space-y-2"><label class="text-sm font-medium text-slate-700">Nama</label><input type="text" name="name" value="{{ old('name', $about->name) }}" class="w-full rounded-2xl border-slate-200"></div>
        <div class="space-y-2"><label class="text-sm font-medium text-slate-700">Headline</label><input type="text" name="headline" value="{{ old('headline', $about->headline) }}" class="w-full rounded-2xl border-slate-200"></div>
        <div class="space-y-2 md:col-span-2"><label class="text-sm font-medium text-slate-700">Short Bio</label><textarea name="short_bio" rows="3" class="w-full rounded-2xl border-slate-200">{{ old('short_bio', $about->short_bio) }}</textarea></div>
        <div class="space-y-2 md:col-span-2"><label class="text-sm font-medium text-slate-700">Full Bio</label><textarea name="full_bio" rows="8" class="w-full rounded-2xl border-slate-200">{{ old('full_bio', $about->full_bio) }}</textarea></div>
        <div class="space-y-2"><label class="text-sm font-medium text-slate-700">Photo</label><input type="file" name="photo" class="w-full rounded-2xl border-slate-200">@if ($about->photo)<img src="{{ asset($about->photo) }}" alt="photo" class="mt-2 h-24 rounded-xl object-cover">@endif</div>
        <div class="grid gap-6 md:grid-cols-2 md:col-span-1">
            <div class="space-y-2"><label class="text-sm font-medium text-slate-700">Email</label><input type="email" name="email" value="{{ old('email', $about->email) }}" class="w-full rounded-2xl border-slate-200"></div>
            <div class="space-y-2"><label class="text-sm font-medium text-slate-700">WhatsApp</label><input type="text" name="whatsapp" value="{{ old('whatsapp', $about->whatsapp) }}" class="w-full rounded-2xl border-slate-200"></div>
            <div class="space-y-2"><label class="text-sm font-medium text-slate-700">Location</label><input type="text" name="location" value="{{ old('location', $about->location) }}" class="w-full rounded-2xl border-slate-200"></div>
            <div class="space-y-2"><label class="text-sm font-medium text-slate-700">LinkedIn</label><input type="text" name="linkedin" value="{{ old('linkedin', $about->linkedin) }}" class="w-full rounded-2xl border-slate-200"></div>
            <div class="space-y-2"><label class="text-sm font-medium text-slate-700">Instagram</label><input type="text" name="instagram" value="{{ old('instagram', $about->instagram) }}" class="w-full rounded-2xl border-slate-200"></div>
            <div class="space-y-2"><label class="text-sm font-medium text-slate-700">GitHub</label><input type="text" name="github" value="{{ old('github', $about->github) }}" class="w-full rounded-2xl border-slate-200"></div>
        </div>
    </div>
    <div class="mt-8 flex gap-3"><button type="submit" class="rounded-xl bg-slate-900 px-5 py-3 text-sm font-medium text-white">Simpan</button></div>
</form>
@endsection
