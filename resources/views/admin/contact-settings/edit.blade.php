@extends('admin.layout')
@section('title', 'Contact Settings')
@section('heading', 'Contact Settings')
@section('content')
<form action="{{ route('admin.contact-settings.update') }}" method="POST" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @method('PUT')
    <div class="grid gap-6 md:grid-cols-2">
        <div class="space-y-2"><label class="text-sm font-medium text-slate-700">Email</label><input type="email" name="email" value="{{ old('email', $contactSetting->email) }}" class="w-full rounded-2xl border-slate-200"></div>
        <div class="space-y-2"><label class="text-sm font-medium text-slate-700">WhatsApp</label><input type="text" name="whatsapp" value="{{ old('whatsapp', $contactSetting->whatsapp) }}" class="w-full rounded-2xl border-slate-200"></div>
        <div class="space-y-2"><label class="text-sm font-medium text-slate-700">LinkedIn</label><input type="text" name="linkedin" value="{{ old('linkedin', $contactSetting->linkedin) }}" class="w-full rounded-2xl border-slate-200"></div>
        <div class="space-y-2"><label class="text-sm font-medium text-slate-700">Instagram</label><input type="text" name="instagram" value="{{ old('instagram', $contactSetting->instagram) }}" class="w-full rounded-2xl border-slate-200"></div>
        <div class="space-y-2"><label class="text-sm font-medium text-slate-700">GitHub</label><input type="text" name="github" value="{{ old('github', $contactSetting->github) }}" class="w-full rounded-2xl border-slate-200"></div>
        <div class="space-y-2 md:col-span-2"><label class="text-sm font-medium text-slate-700">CTA Text</label><textarea name="cta_text" rows="3" class="w-full rounded-2xl border-slate-200">{{ old('cta_text', $contactSetting->cta_text) }}</textarea></div>
    </div>
    <div class="mt-8 flex gap-3"><button type="submit" class="rounded-xl bg-slate-900 px-5 py-3 text-sm font-medium text-white">Simpan</button></div>
</form>
@endsection
