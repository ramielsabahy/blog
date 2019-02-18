<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        return view('admin.settings.settings')->with('settings',Setting::first());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request , [
            'site_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'contact_email' => 'required',
            'owner' => 'required'
        ]);
        $setting = Setting::first();
        $setting->site_name = $request->site_name;
        $setting->contact_number = $request->contact_number;
        $setting->address = $request->address;
        $setting->contact_email = $request->contact_email;
        $setting->owner = $request->owner;
        $setting->info = $request->info;
        $setting->save();

        Session::flash('success', 'Settings Updated successfully.');

        return redirect()->back();
    }


}
