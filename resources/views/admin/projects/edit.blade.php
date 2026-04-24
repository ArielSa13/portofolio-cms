@extends('admin.layout')
@section('title', 'Edit Project')
@section('heading', 'Edit Project')
@section('content')
<form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @method('PUT')
    @include('admin.projects._form')
</form>
@endsection
