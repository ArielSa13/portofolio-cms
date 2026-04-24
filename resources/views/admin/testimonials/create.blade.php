@extends('admin.layout')
@section('title', 'Tambah Testimonial')
@section('heading', 'Tambah Testimonial')
@section('content')
<form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @include('admin.testimonials._form')
</form>
@endsection
