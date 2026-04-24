@extends('admin.layout')
@section('title', 'Tambah Service')
@section('heading', 'Tambah Service')
@section('content')
<form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @include('admin.services._form')
</form>
@endsection
