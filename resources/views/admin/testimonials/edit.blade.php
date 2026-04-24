@extends('admin.layout')
@section('title', 'Edit Testimonial')
@section('heading', 'Edit Testimonial')
@section('content')
<form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-6">
    @csrf
    @method('PUT')
    @include('admin.testimonials._form')
</form>
@endsection
