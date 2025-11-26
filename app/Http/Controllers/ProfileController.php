<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $articles = $user->articles()->withCount('likes')->latest()->get();
        
        return view('profile.show', compact('user', 'articles'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username,' . Auth::id(),
            'password' => 'nullable|min:6',
        ]);

        $user = Auth::user();
        $data = $request->only(['nama', 'username']);
        
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        
        return redirect()->route('profile.show')->with('success', 'Profil berhasil diupdate!');
    }
}