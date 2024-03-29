<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the form data

        $credentials = $request->only('email', 'password');
        $role = $request->query('role');

        if ($role === 'responsable') {
            if (Auth::guard('responsable')->attempt($credentials)) {
                // Authentication passed
                return redirect()->intended('/dashboard');
            }
        } elseif ($role === 'membre') {
            if (Auth::guard('membre')->attempt($credentials)) {
                // Authentication passed
                return redirect()->intended('/homepage');
            }
        }

        // Authentication failed
        return redirect()->back()->withInput($request->only('email'));
    }
}