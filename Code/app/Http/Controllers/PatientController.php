<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SweetAlert;

class PatientController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function update(Request $request)
    {
        if (auth()->user()->avatar == 'users/images/default.png')
        {
            $path = Storage::disk('s3')->put('users/images', $request->avatar);
        } elseif (!$request->hasFile('avatar')) {
            $path = auth()->user()->avatar;
        } else {
            Storage::disk('s3')->delete(auth()->user()->avatar);
            $path = Storage::disk('s3')->put('users/images', $request->avatar);
        }
        $age = Carbon::parse($request->dob)->age;
//        $user = User::where('id', auth()->id())->first();
//        $user->avatar = $path;
//        $user->name = $request->name;
//        $user->dob = $request->dob;
//        $user->email = $request->email;
//        $user->bloodType = $request->bloodType;
//        $user->address = $request->address;
//        $user->mobile = $request->mobile;
//        $user->age = $age;
//        $user->save();
        User::where('id', auth()->id())->update([
            'name' => $request->name,
            'dob' => $request->dob,
            'email' => $request->email,
            'bloodType' => $request->bloodType,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'avatar' => $path,
            'age' => $age
        ]);

        alert()->success('Image Updated!', 'Success')->autoclose(3000);
        return back();
    }

    /**
     * Validate password entry
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validatePatientPasswords(array $data)
    {
        $messages = [
            'password.required' => 'Please enter your current password',
            'new_password.required' => 'Please enter a new password',
            'confirm_new_password.not_in' => 'Sorry, common passwords are not allowed. Please try a different new password.'
        ];

        $validator = Validator::make($data, [
            'password' => 'required',
            'new_password' => 'required', 'min:8', 'same:new_password',
            'confirm_new_password' => 'required|same:new_password',
        ], $messages);

        return $validator;
    }

    /**
     * Change users password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePatientPassword(Request $request)
    {
        if(auth()->Check())
        {
            $requestData = $request->all();
            $validator = $this->validatePatientPasswords($requestData);
            if($validator->fails())
            {
                return back()->withErrors($validator->getMessageBag());
            }
            else
            {
                $currentPassword = auth()->user()->password;
                if(Hash::check($requestData['password'], $currentPassword))
                {
                    $user = User::where('id', auth()->id())->first();
                    $user->password = bcrypt($requestData['new_password']);;
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
}