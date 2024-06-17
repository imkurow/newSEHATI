<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }
        return view('user.show', compact('user'));
    }

    public function updateProfilePicture(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($user->image_path) {
                Storage::disk('public')->delete($user->image_path);
            }

            // Store the new image
            $path = $request->file('image')->store('profile_images', 'public');
            $user->image_path = $path;
            $user->save();

            return redirect()->route('user.show')->with('success', 'Profile picture updated successfully.');
        }

        return redirect()->route('user.show')->with('error', 'No image was uploaded.')->withInput();
    }

    public function updateUserDetails(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'sex' => 'required|string|in:Male,Female',
            'height' => 'required|integer|max:300',
            'weight' => 'required|numeric'
        ]);

        $user->update([
            'name' => $request->name,
            'dob' => $request->dob,
            'sex' => $request->sex,
            'height' => $request->height,
            'weight' => $request->weight,
        ]);

        return redirect()->route('user.show')->with('success', 'User details updated successfully.');
    }

    public function updateAccountDetails(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
            'phone' => 'required|string|max:15',
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'phone' => $request->phone,
        ]);

        return redirect()->route('user.show')->with('success', 'Account details updated successfully.');
    }
}
