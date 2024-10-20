<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index()
    {
        return view('backend/login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // dd($credentials);
 
        if (Auth::attempt($credentials)) 
        {
            // if (auth()->user()->role == 'admin') 
            // {
                // dd(auth()->user()->role);
                $request->session()->regenerate();
                return redirect()->route('dashboard.index');
            // } else {
            //     $request->session()->regenerate();
            //     return redirect()->route('home');
            // }
        } else {
            return redirect()->route('login.index')
                ->with('error','Email atau Password Salah');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
    
}
