<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    // Authenticated admin: display change password form
    public function edit()
    {
        return view('admin.auth.change-password');
    }

    // Update password in admins table
    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.login')
                ->with('error', 'Please log in first.');
        }

        $validated = $request->validate([
            'current_password' => [
                'required',
                'current_password:admin',
            ],
            'password' => [
                'required',
                'confirmed',
                'different:current_password',
                Password::min(8),
            ],
        ]);

        $admin->password = Hash::make($validated['password']);
        $admin->save();

        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with(
                'success',
                'Password changed successfully. Please log in with your new password.'
            );
    }

    // Public: display forgot password form
    public function showForgotPasswordForm()
    {
        return view('admin.auth.forgot-password');
    }
}
