<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logoutController extends Controller
{
    public function logout(): \Illuminate\Http\RedirectResponse
    {
        if (auth()->user()) {
            Auth::logout();
            return redirect()->route('login');
        }
        return redirect()->route('home');
    }
}
