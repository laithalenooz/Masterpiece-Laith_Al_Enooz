<?php

namespace App\Http\Controllers\Auth;

use App\Clinic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClinicRegisterController extends Controller
{
    public function __construct ()
    {
        $this->middleware('guest:clinic');
    }

    public function showRegisterForm()
    {
        return view('auth.clinic-register');
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
            $admin = Clinic::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            // Log the admin in
            auth()->guard('clinic')->loginUsingId($admin->id);
            return redirect()->route('clinic.dashboard');

        } catch (\Exception $exception) {
            return redirect()->back()->withInput($request->only('name', 'email'));
        }
    }
}
