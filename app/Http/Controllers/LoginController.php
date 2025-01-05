<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    // form page: login
    public function index(): View
    {
        return view('auth.login');
    }
}
