<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

    public function updateUserDetails(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        Log::info('Update user details request data:', $request->all());

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'dob' => 'required|date',
                'sex' => 'required|string|in:Male,Female',
                'height' => 'required|integer|max:300',
                'weight' => 'required|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            Log::info('Validation passed', $validatedData);

            Log::info('Before update:', $user->toArray());

            if ($request->hasFile('image')) {
                // Delete the old image if exists
                if ($user->image_path) {
                    Storage::disk('public')->delete($user->image_path);
                }
                $path = $request->file('image')->store('profile_images', 'public');
                $user->image_path = $path;
            }

            $user->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'sex' => $request->sex,
                'height' => $request->height,
                'weight' => $request->weight,
            ]);

            Log::info('After update:', $user->toArray());

            Log::info('User updated successfully');

            return redirect()->route('user.show')->with('success', 'User details updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed:', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Update failed:', $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update user details.')->withInput();
        }
    }

    public function updateAccountDetails(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        Log::info('Update account details request data:', $request->all());

        try {
            $validatedData = $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'nullable|string|min:8',
                'phone' => 'required|string|max:15',
            ]);

            Log::info('Validation passed', $validatedData);

            Log::info('Before update:', $user->toArray());

            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
                'phone' => $request->phone,
            ]);

            Log::info('After update:', $user->toArray());
            
            Log::info('Account updated successfully');

            return redirect()->route('user.show')->with('success', 'Account details updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed:', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Update failed:', $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update account details.')->withInput();
        }
    }
}



