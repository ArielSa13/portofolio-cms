<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function edit()
    {
        return view('admin.contact-settings.edit', ['contactSetting' => ContactSetting::query()->firstOrCreate(['id' => 1])]);
    }

    public function update(Request $request)
    {
        $contactSetting = ContactSetting::query()->firstOrCreate(['id' => 1]);
        $data = $request->validate([
            'email' => ['nullable', 'email', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'max:255'],
            'cta_text' => ['nullable', 'string'],
        ]);
        $contactSetting->update($data);
        return redirect()->route('admin.contact-settings.edit')->with('success', 'Kontak berhasil diperbarui.');
    }
}
