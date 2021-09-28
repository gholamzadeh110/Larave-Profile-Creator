<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    function index()
    {
        $prof_id = Auth::user()->profile()->first()->id;
        $profile = Profile::where('id',"$prof_id")->with('contacts','experiences','projects','educations','skills','workflows','interests','awards','donates')->first();
        if ($profile){
            return view('Admin/dashboard.index')->with('profile',$profile);
        }
    }
    public function publish($id)
    {
        $profile = Profile::where('id',$id)->first();
        $profile->publish = 1;
        $profile->save();
        $msg = __('messages.Profile_Published_Successfully');
        return redirect()->route('dashboard.index')->with('success',$msg);
    }

}
