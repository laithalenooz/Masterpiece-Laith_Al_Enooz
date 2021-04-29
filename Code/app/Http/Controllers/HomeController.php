<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Clinic;
use App\Http\Requests\AppointmentRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showClinic($id)
    {
        $clinic = Clinic::where('id', $id)->first();
        return view('public.clinic')->with('clinic', $clinic);
    }

    public function allClinics()
    {
        return view('public.clinics_grid')->with('clinics', Clinic::paginate(15));
    }

    public function Book(AppointmentRequest $request, $id)
    {
        $date = Carbon::createFromFormat('Y-m-d', $request->date)->format('d F, y');
        $time = Carbon::createFromFormat('H:m', $request->time)->format('h:m A');
        $appointment = Appointment::create([
            'date' => $date,
            'time' => $time,
            'user_id' => auth()->id(),
            'clinic_id' => $id
        ]);

        return view('public.booking-success')->with('appointment', $appointment);
    }

    public function search( Request $request)
    {
        $search_text = $_GET['query'];

        return view('public.search')->with('clinics', Clinic::where('name', 'like', '%'.$search_text.'%')
            ->orWhere('address', 'like', '%'.$search_text.'%')
            ->orWhere('about', 'like', '%'.$search_text.'%')
            ->orWhere('mobile', 'like', '%'.$search_text.'%')
            ->paginate(10));
    }
}
