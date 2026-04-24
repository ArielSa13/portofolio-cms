<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.testimonials.index', ['testimonials' => Testimonial::query()->latest()->paginate(12)]);
    }

    public function create()
    {
        return view('admin.testimonials.create', ['testimonial' => new Testimonial()]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/testimonials'), $filename);
            $data['photo'] = 'uploads/testimonials/'.$filename;
        }
        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil dibuat.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $this->validatedData($request);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/testimonials'), $filename);
            $data['photo'] = 'uploads/testimonials/'.$filename;
        }
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
    }

    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);
    }
}
