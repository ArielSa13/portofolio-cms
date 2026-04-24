@extends('admin.layout')
@section('title', 'Tambah Project')
@section('heading', 'Tambah Project')
@section('content')
<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @include('admin.projects._form')
</form>
@endsection
