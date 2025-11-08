<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'nickname' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'date_of_birth' => 'nullable|date|before:today',
            'height' => 'nullable|numeric|min:50|max:300',
            'weight' => 'nullable|numeric|min:20|max:500',
            'gender' => 'nullable|in:male,female,other',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Upload foto baru
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $validated['profile_photo'] = $path;
        }

        $user->update($validated);

        return redirect()->route('profile.edit')
            ->with('success', 'Profile updated successfully!');
    }

    public function show()
    {
        $user = auth()->user();
        return view('profile.show', compact('user'));
    }
}