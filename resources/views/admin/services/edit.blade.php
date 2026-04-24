@extends('admin.layout')
@section('title', 'Edit Service')
@section('heading', 'Edit Service')
@section('content')
<form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @method('PUT')
    @include('admin.services._form')
</form>
@endsection
