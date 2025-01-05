<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    // form page: login
    public function index(): View
    {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // validate the credentials
        $attrs = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // attempt to login the user
        $can_login = Auth::attempt($attrs, $request->get('remember_me') == "on");

        if (!$can_login) {
            throw ValidationException::withMessages(
                ['email' => 'Invalid password or email']
            );
        }

        // regenerate the session token
        $request->session()->regenerate();

        // redirect to home page
        // TODO: redirect to dashboard
        return redirect('/events');
    }

    public function destroy(): RedirectResponse
    {
        Auth::logout();

        // redirect to home page
        // TODO: redirect to dashboard
        return redirect('/events');
    }
}
