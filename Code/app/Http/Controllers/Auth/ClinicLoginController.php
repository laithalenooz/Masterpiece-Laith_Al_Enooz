<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClinicLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:clinic')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.clinic-login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request,
        [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]
        );

        // Attempt to login as clinic
        if (auth()->guard('clinic')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successful then redirect to intended route or clinic dashboard
            return redirect()->intended(route('clinic.dashboard'));
        }

        // If unsuccessful then redirect back to login page with email and remember fields
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        auth()->guard('clinic')->logout();
        return redirect('/');
    }
}
