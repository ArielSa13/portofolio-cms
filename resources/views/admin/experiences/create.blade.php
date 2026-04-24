@extends('admin.layout')
@section('title', 'Tambah Experience')
@section('heading', 'Tambah Experience')
@section('content')
<form action="{{ route('admin.experiences.store') }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @include('admin.experiences._form')
</form>
@endsection
