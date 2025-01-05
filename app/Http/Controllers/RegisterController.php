<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisterController extends Controller
{
    // form page: signup
    public function index(): View
    {
        return view('auth.signup');
    }

    // form action
    public function store(Request $request): RedirectResponse
    {
        // validate the fields
        $attrs = $request->validate([
            'name' => ['required'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()],
            'email' => ['required', 'email']
        ]);

        // create the user
        $user = User::create($attrs);

        // login the user
        Auth::login($user);

        // redirect to organizations page
        return redirect('/');
    }
}
