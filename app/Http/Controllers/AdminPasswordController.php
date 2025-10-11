<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\PasswordResetNotification;
use Illuminate\Support\Facades\Mail;

class AdminPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('admin.reset-password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();
        $new_password = $request->new_password_confirmation;

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        Mail::to($user->email)->send(new PasswordResetNotification($user->name, $user->email, $new_password));

        return back()->with('success', 'Password updated successfully');
    }
}
