<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return view('admin.skills.index', ['skills' => Skill::query()->latest()->paginate(12)]);
    }

    public function create()
    {
        return view('admin.skills.create', ['skill' => new Skill()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'level' => ['nullable','integer','min:1','max:100'],
            'category' => ['nullable','string','max:100'],
        ]);
        Skill::create($data);
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil dibuat.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'level' => ['nullable','integer','min:1','max:100'],
            'category' => ['nullable','string','max:100'],
        ]);
        $skill->update($data);
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil diperbarui.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil dihapus.');
    }
}
