<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoggedInDeviceManagerController extends Controller
{
    /**
     * Display a listing of the currently logged in devices.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = DB::table('sessions')
            ->where('user_id', auth()->user()->id)
            ->get()->reverse();

        return view('frontend.devices_list')
            ->with('devices', $devices)
            ->with('current_session_id', Session::getId());
    }


    /**
     * Logout a session based on session id.
     *
     * @return \Illuminate\Http\Response
     */
    public function logoutDevice(Request $request, $device_id)
    {

        DB::table('sessions')
            ->where('id', $device_id)
            ->delete();

        return redirect(route('logged-in-devices.list'));
    }



    /**
     * Logouts a user from all other devices except the current one.
     *
     * @return \Illuminate\Http\Response
     */
    public function logoutAllDevices(Request $request)
    {
        DB::table('sessions')
            ->where('user_id', auth()->user()->id)
            ->where('id', '!=', Session::getId())->delete();

        return redirect(route('logged-in-devices.list'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
