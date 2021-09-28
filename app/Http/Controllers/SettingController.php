<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use Auth;
use App;

class SettingController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->profile()->first();
        $setting = $profile->setting()->first();
        $langs = ["fa","en",];
        $themes = ["theme_A","theme_B",];
        $rtl = ["Left","Right",];
        if ($profile){
            return view('Admin.pages.setting.index')->with('profile',$profile)
                ->with('setting',$setting)->with('langs',$langs)->with('themes',$themes)->with('rtl',$rtl);
        }
    }


    public function store(Request $request)
    {
        $profile = Auth::user()->profile()->first();
        $profile->setting()->first() ? $setting = $profile->setting()->first():$setting = new setting();
        $validatedData = [
            'lang' =>  'required',
            'theme' =>  'required',
            'rtl' =>  'required',
        ];
        $messages = [
            'lang.required' => __('messages.Lang_required_validation'),
            'theme.required' => __('messages.Theme_required_validation'),
            'rtl.required' => __('messages.Rtl_required_validation'),
        ];
        $this->validate($request, $validatedData, $messages);
        $setting->lang = $request->lang;
        $setting->theme = $request->theme;
        $setting->rtl = $request->rtl;
        $setting->profile_id = $profile->id ;
        $setting->save();
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        $msg = __('messages.Setting_Update_Successfully');
        return redirect()->route('setting.index')->with('success',$msg);
    }
}
