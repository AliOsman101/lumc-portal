<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Password as PasswordFacade;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class PasswordController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle sending of reset link.
     */
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }

    /**
     * Update the authenticated user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = $request->user();

        if (! Hash::check($request->input('current_password'), $user->password)) {
            return redirect('/profile')
                ->withErrors(['current_password' => 'The provided password does not match our records.'], 'updatePassword');
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/profile');
    }
}
