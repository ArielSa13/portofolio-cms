<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::latest()->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.projects.create', [
            'project' => new Project(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $data['cover_image'] = 'uploads/projects/' . $filename;
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dibuat.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validatedData($request);
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $data['cover_image'] = 'uploads/projects/' . $filename;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus.');
    }

    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'category' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'tech_stack' => ['nullable', 'string'],
            'demo_url' => ['nullable', 'url'],
            'repo_url' => ['nullable', 'url'],
            'is_featured' => ['nullable', 'boolean'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
        ]);
    }
}
