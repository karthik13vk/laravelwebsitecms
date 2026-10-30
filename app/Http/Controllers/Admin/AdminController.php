<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    // Admin login page
public function login()
{
    if (Auth::guard('admin')->check()) {
        return redirect()->route('admin.dashboard');
    }

    return view('admin.auth.login');
}

public function loginSubmit(Request $request)
{
    $credentials = $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required', 'string'],
    ]);

    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    return back()
        ->withErrors(['username' => 'Invalid username or password.'])
        ->onlyInput('username');
}

    // Add a new admin user
 public function addNewUser()
{
    return view('admin.auth.add-user');
}

    // Admin logout
public function logout(Request $request)
{
    Auth::guard('admin')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.login');
}


    // Update password for the logged-in admin
public function update_password(Request $request)
{
    $request->validate([
        'current_password' => ['required', 'current_password:admin'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $admin = Auth::guard('admin')->user();

    $admin->password = Hash::make($request->password);
    $admin->save();

    return back()->with('success', 'Password updated successfully!');
}

    // Forgot password page (UI only)
public function forgot_password()
{
    return view('admin.auth.forgot-password');
}


    // Change password page
public function changepassword()
{
    return view('admin.auth.change-password');
}
    // Admin profile page

// public function profile()
// {
//     $admin = Auth::guard('admin')->user();

//     if (!$admin) {
//         return redirect()->route('admin.login')
//             ->with('error', 'Please log in to access your profile.');
//     }

//     return view('admin.auth.profile', compact('admin'));
// }
public function profile()
{
    $admin = auth('admin')->user();

    if (!$admin) {
        return redirect()->route('admin.login');
    }

    return view('admin.auth.profile', compact('admin'));
}

// Store a new admin account
public function storeNewUser(Request $request)
{
    $data = $request->validate([
        'username' => ['required', 'string', 'max:255', 'unique:admins,username'],
        'password' => ['required', 'confirmed', Password::min(8)],
         'role' => ['required', 'in:Admin,Manager,Staff'],
    ]);

    Admin::create([
        'username' => $data['username'],
        'password' => Hash::make($data['password']),
        'role' => $request->role,
    ]);

    return redirect()->route('admin.add-user')
        ->with('success', 'New admin user created successfully.');
}
    // Save admin profile
public function save_profile(Request $request)
{
    $admin = Auth::guard('admin')->user();

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:100', 'unique:admins,username,' . $admin->id],
        'address' => ['nullable', 'string', 'max:2000'],
        'country' => ['nullable', 'string', 'max:100'],
        'state' => ['nullable', 'string', 'max:100'],
        'city' => ['nullable', 'string', 'max:100'],
        'pincode' => ['nullable', 'string', 'max:20'],
        'mobile_number' => ['nullable', 'string', 'max:30'],
        'email' => ['nullable', 'email', 'max:255'],
         'profile_picture' => [
            'nullable',
            'image',
            'mimes:jpg,jpeg,png,webp',
            'max:2048',
        ],
    ]);

    $admin->name = $validated['name'];
    $admin->email = $validated['email'];
 if (array_key_exists('username', $validated)) {
        $admin->username = $validated['username'];
    }

    if (array_key_exists('phone', $validated)) {
        $admin->phone = $validated['phone'];
    }

    // Upload a new picture only if the user selected one.
    if ($request->hasFile('profile_picture')) {
        $oldPicture = $admin->profile_picture;

        $newPicture = $request->file('profile_picture')
            ->store('admin-profiles', 'public');

        $admin->profile_picture = $newPicture;

        // Save the new path before removing the old file.
        $admin->save();

        if ($oldPicture && $oldPicture !== $newPicture) {
            Storage::disk('public')->delete($oldPicture);
        }
    } else {
        // Saving other fields must not remove the current picture.
        $admin->save();
    }

    return redirect()
        ->route('admin.profile')
        ->with('success', 'Profile updated successfully.');
}
// public function deleteProfileImage()
// {
//     $admin = auth('admin')->user();

//     if (!$admin) {
//         return redirect()->route('admin.login');
//     }

//     if ($admin->profile_picture) {
//         \Illuminate\Support\Facades\Storage::disk('public')
//             ->delete($admin->profile_picture);

//         $admin->profile_picture = null;
//         $admin->save();
//     }

//     return redirect()
//         ->route('admin.profile')
//         ->with('success', 'Profile picture deleted successfully!');
// }
public function deleteProfileImage()
{
    $admin = auth('admin')->user();

    if (!$admin) {
        return redirect()->route('admin.login');
    }

    if (!$admin->profile_picture) {
        return redirect()
            ->route('admin.profile')
            ->with('info', 'No profile picture to delete.');
    }

    $picturePath = $admin->profile_picture;

    // Clear the database field first.
    $admin->profile_picture = null;
    $admin->save();

    // Delete the actual file from storage/app/public.
    Storage::disk('public')->delete($picturePath);

    return redirect()
        ->route('admin.profile')
        ->with('success', 'Profile picture deleted successfully.');
}
}
