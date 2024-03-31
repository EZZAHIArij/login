<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller

{
    protected $redirectTo = '/dashboard'; // Default redirect path after login

    public function memberLogin(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('membre')->attempt($credentials)) {
            // Authentication passed for membre
            return redirect()->intended('/homepage');
        }

        // Authentication failed
        return redirect()->back()->withInput($request->only('email'));
    }

    public function responsibleLogin(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('responsable')->attempt($credentials)) {
            // Authentication passed for responsable
            return redirect()->intended('/dashboard');
        }

        // Authentication failed
        return redirect()->back()->withInput($request->only('email'));
    }
}
