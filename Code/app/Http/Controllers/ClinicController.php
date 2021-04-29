<?php

namespace App\Http\Controllers;

use App\About;
use App\Appointment;
use App\Clinic;
use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Requests\UpdateClinicAboutRequest;
use App\Http\Requests\UpdateClinicInformationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClinicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware( 'auth:clinic' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view( 'clinic.dashboard' )->with( 'appointments', Appointment::where( 'clinic_id', auth()->guard( 'clinic' )->id() )->with( 'clinic', 'user' )->get() );
    }

    public function updateAvatar( UpdateAvatarRequest $request )
    {
        if ( auth()->guard( 'clinic' )->user()->avatar == 'clinics/images/default.png' ) {
            $path = Storage::disk( 's3' )->put( 'clinics/images', $request->avatar );
        } elseif ( !$request->hasFile( 'avatar' ) ) {
            $path = auth()->user()->avatar;
        } else {
            Storage::disk( 's3' )->delete( auth()->guard( 'clinic' )->user()->avatar );
            $path = Storage::disk( 's3' )->put( 'users/images', $request->avatar );
        }

        Clinic::where( 'id', auth()->guard( 'clinic' )->id() )->update( [
            'avatar' => $path
        ] );

        alert()->success( 'Image Updated!', 'Success' )->autoclose( 3000 );
        return back();
    }

    /**
     * Validate password entry
     *
     * @param Clinic $clinic
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateInformation( UpdateClinicInformationRequest $request, Clinic $clinic )
    {
        $clinic->update( $request->validated() );

        alert()->success( 'Information Updated!', 'Success' )->autoclose( 3000 );
        return back();
    }

    public function updateAbout( UpdateClinicAboutRequest $request )
    {
        Clinic::where( 'id', auth( 'clinic' )->id() )->update( $request->validated() );

        alert()->success( 'About information Updated!', 'Success' )->autoclose( 3000 );
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAbout()
    {
        $clinic        = auth( 'clinic' )->user();
        $clinic->about = null;
        $clinic->save();

        alert()->success( 'About information Deleted!', 'Success' )->autoclose( 3000 );
        return back();
    }

    public function updateLocation( Request $request )
    {
        $clinic      = auth( 'clinic' )->user();
        $clinic->lat = $request->input( 'lat' );
        $clinic->lng = $request->input( 'lng' );
        $clinic->save();

        alert()->success( 'Location information Updated!', 'Success' )->autoclose( 3000 );
        return back();
    }

    public function updatePassword( Request $request )
    {

    }
}
