<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.services.index', ['services' => Service::query()->latest()->paginate(12)]);
    }

    public function create()
    {
        return view('admin.services.create', ['service' => new Service()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'icon' => ['nullable','string','max:100'],
            'sort_order' => ['nullable','integer','min:0'],
        ]);
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Service berhasil dibuat.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'icon' => ['nullable','string','max:100'],
            'sort_order' => ['nullable','integer','min:0'],
        ]);
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Service berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service berhasil dihapus.');
    }
}
