<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminRegisterController extends Controller
{
    public function __construct ()
    {
        $this->middleware('guest:admin');
    }

    public function showRegisterForm()
    {
        return view('auth.admin-register');
    }

    public function register(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate form data
        $this->validate($request,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

        // Create admin user
        try {
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            // Log the admin in
            auth()->guard('admin')->loginUsingId($admin->id);
            return redirect()->route('admin.dashboard');

        } catch (\Exception $exception) {
            return back()->withInput($request->only('name', 'email'));
        }
    }
}
