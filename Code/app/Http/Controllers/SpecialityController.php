<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialityController extends Controller
{
    public function addSpeciality(Request $request)
    {
        $validatedData = $request->validate([
            'speciality' => 'required|unique:specialities',
            'avatar'     => 'required'
        ]);

        $path = Storage::disk('s3')->put('clinic/specialities', $request->avatar);
        Speciality::create([
            'avatar' => $path,
            'speciality' => $request->speciality
        ]);
        alert()->success('Speciality Added!', 'Successful')->autoclose(3000);
        return back();
    }

    public function updateSpeciality($id, Request $request)
    {
        $validatedData = $request->validate([
            'speciality' => 'required|unique:specialities'
        ]);
        if($request->hasFile('avatar'))
        {
            Storage::disk('s3')->delete(Speciality::where('id', $id)->value('avatar'));
            $path = Storage::disk('s3')->put('clinic/specialities', $request->avatar);
        } else {
            $path = Speciality::where('id', $id)->value('avatar');
        }

        Speciality::where('id', $id)->update([
            'avatar' => $path,
            'speciality' => $request->input('speciality')
        ]);
        alert()->success('Speciality Updated!', 'Successful')->autoclose(3000);
        return back();
    }

    public function deleteSpeciality($id)
    {
        $speciality = Speciality::findOrFail($id);
        $speciality->delete();

        alert()->success('Speciality Deleted!', 'Success')->autoclose(3000);
        return back();
    }
}
