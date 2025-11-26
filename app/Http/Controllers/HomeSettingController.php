<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSetting;

class HomeSettingController extends Controller
{
    public function edit()
    {
        $settings = HomeSetting::getSettings();
        return view('home-settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_title' => 'required|max:255',
            'hero_subtitle' => 'required',
            'hero_background' => 'nullable|image|max:2048',
            'about_title' => 'required|max:255',
            'about_description' => 'required',
            'contact_phone' => 'nullable|max:20',
            'contact_email' => 'nullable|email',
            'contact_address' => 'nullable'
        ]);

        $settings = HomeSetting::getSettings();
        $data = $request->except('hero_background');

        if ($request->hasFile('hero_background')) {
            $data['hero_background'] = $request->file('hero_background')->store('backgrounds', 'public');
        }

        $settings->update($data);

        return redirect()->route('home-settings.edit')->with('success', 'Pengaturan berhasil diupdate!');
    }
}