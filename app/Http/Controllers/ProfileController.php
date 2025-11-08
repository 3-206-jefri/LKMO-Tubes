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

        try {
            if ($request->hasFile('profile_photo')) {
                // Hapus foto lama jika ada
                if ($user->profile_photo) {
                    $oldPath = public_path($user->profile_photo);
                    if (file_exists($oldPath)) {
                        @unlink($oldPath);
                    }
                }

                // Upload foto baru
                $file = $request->file('profile_photo');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/profile-photos'), $filename);
                
                // PENTING: Path harus 'storage/profile-photos/...'
                $user->profile_photo = 'storage/profile-photos/' . $filename;
            }

            // Update data lainnya
            $user->username = $validated['username'];
            $user->nickname = $validated['nickname'] ?? null;
            $user->email = $validated['email'];
            $user->date_of_birth = $validated['date_of_birth'] ?? null;
            $user->height = $validated['height'] ?? null;
            $user->weight = $validated['weight'] ?? null;
            $user->gender = $validated['gender'] ?? null;
            
            $user->save();

            return redirect()->route('profile.edit')
                ->with('success', 'Profile updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update profile: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show()
    {
        $user = auth()->user();
        return view('profile.show', compact('user'));
    }
}