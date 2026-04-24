@extends('admin.layout')
@section('title', 'Tambah Skill')
@section('heading', 'Tambah Skill')
@section('content')
<form action="{{ route('admin.skills.store') }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @include('admin.skills._form')
</form>
@endsection
