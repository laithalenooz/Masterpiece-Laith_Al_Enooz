<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Appointment;
use App\Clinic;
use App\Settings;
use App\Speciality;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SweetAlert;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function appointments()
    {
        return view('admin.appointments')->with('appointments', Appointment::with('clinic', 'user')->paginate(10));
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        Admin::where('id', auth()->guard('admin')->id())->update($request->except('_token'));

        alert()->success('Profile Updated!', 'Successful')->autoclose(3000);

        return redirect()->back();
    }

    /**
     * Change users password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        if(auth()->guard('admin')->Check())
        {
            $requestData = $request->All();
            $validator = $this->validatePasswords($requestData);
            if($validator->fails())
            {
                return back()->withErrors($validator->getMessageBag());
            }
            else
            {
                $currentPassword = auth()->guard('admin')->user()->password;
                if(Hash::check($requestData['password'], $currentPassword))
                {
                    $user = Admin::find(auth()->guard('admin')->id());
                    $user->password = bcrypt($requestData['new-password']);;
                    $user->save();
                    alert()->success('Password Updated!', 'Success')->autoclose(3000);
                    return back();
                }
                else
                {
                    return back()->withErrors(['Sorry, your current password was not recognised. Please try again.']);
                }
            }
        }
        else
        {
            // Auth check failed - redirect to domain root
            return redirect()->to('/');
        }
    }

    /**
     * Validate password entry
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validatePasswords(array $data)
    {
        $messages = [
            'password.required' => 'Please enter your current password',
            'new-password.required' => 'Please enter a new password',
            'new-password-confirmation.not_in' => 'Sorry, common passwords are not allowed. Please try a different new password.'
        ];

        $validator = Validator::make($data, [
            'password' => 'required',
            'new-password' => 'required', 'same:new-password', 'min:8',
            'new-password-confirmation' => 'required|same:new-password',
        ], $messages);

        return $validator;
    }

    public function imageUpdate(Request $request)
    {
        Storage::disk('s3')->delete(auth()->guard('admin')->user()->avatar);
        $path = Storage::disk('s3')->put('admin/profiles', $request->avatar);
        Admin::where('id', auth()->guard('admin')->id())->update([
            'avatar' => $path
        ]);
        alert()->success('Image Updated!', 'Success')->autoclose(3000);
        return back();
    }

    public function Settings(Request $request)
    {
        Storage::disk('s3')->delete(Settings::where('id', 1)->value('website_logo'));
        Storage::disk('s3')->delete(Settings::where('id', 1)->value('website_logo_footer'));
        Storage::disk('s3')->delete(Settings::where('id', 1)->value('website_favicon'));
        $website_logo = Storage::disk('s3')->put('website/logo', $request->website_logo);
        $website_logo_footer = Storage::disk('s3')->put('website/logo', $request->website_logo_footer);
        $website_favicon = Storage::disk('s3')->put('website/favicon', $request->website_favicon);
        Settings::where('id', 1)->update([
            'website_name' => $request->website_name,
            'website_logo' => $website_logo,
            'website_logo_footer' => $website_logo_footer,
            'website_favicon' => $website_favicon,
        ]);
        alert()->success('Website Settings Updated!', 'Success')->autoclose(3000);
        return back();
    }

    public function patientsView()
    {
        return view('admin.patients')->with('users', User::paginate(10));
    }

    public function deletePatient($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        alert()->success('User Deleted!', 'Success')->autoclose(3000);
        return back();
    }

    public function addClinic(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:clinics',
            'email' => 'required|unique:clinics|email',
            'speciality' => 'required',
            'password' => 'required',
        ]);

        Clinic::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'speciality' => $request->input('speciality'),
            'password' => bcrypt($request->password)
        ]);
        alert()->success('Clinic Added!', 'Successful')->autoclose(3000);
        return back();
    }

    public function deleteClinic($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();

        alert()->success('Clinic Deleted!', 'Success')->autoclose(3000);
        return back();
    }

    public function showSpecialities()
    {
        $specialities = Speciality::paginate(10);
        return view('admin.specialities')->with('specialities', $specialities);
    }

    public function showClinics()
    {
        $clinics = Clinic::paginate(10);
        return view('admin.clinics')->with('clinics', $clinics);
    }
}
