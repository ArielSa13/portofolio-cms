@extends('admin.layout')
@section('title', 'Edit Experience')
@section('heading', 'Edit Experience')
@section('content')
<form action="{{ route('admin.experiences.update', $experience) }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @method('PUT')
    @include('admin.experiences._form')
</form>
@endsection
