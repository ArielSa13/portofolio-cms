@extends('admin.layout')
@section('title', 'Edit Skill')
@section('heading', 'Edit Skill')
@section('content')
<form action="{{ route('admin.skills.update', $skill) }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @method('PUT')
    @include('admin.skills._form')
</form>
@endsection
