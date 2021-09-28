<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profile;
use Illuminate\Http\Request;
use Auth;

class ExperienceController extends Controller
{

    public function index()
    {
        $profile = Auth::user()->profile()->first();
        $experiences = $profile->experiences()->get();
        if ($profile){
            return view('Admin.pages.experience.index')->with('profile',$profile)->with('experiences',$experiences);
        }
    }

    public function store(Request $request)
    {

        $experience = new Experience();
        $validatedData = [

            'title' =>  'required',
            'profile_id' =>  'required',
        ];
        $messages = [
            'title.required' => __('messages.title_required_validation'),
            'profile_id.required' => __('messages.Profile_required_validation'),
        ];
        $this->validate($request, $validatedData, $messages);

        $request->title ?  $experience->title = $request->title:$experience->title = '';
        $request->subtitle ?   $experience->subtitle = $request->subtitle: $experience->subtitle='';
        $request->description ?  $experience->description = $request->description : $experience->description='';
        $request->start_date ?  $experience->start_date = $request->start_date : $experience->start_date=date.now('Y-m-d');
        $request->end_date ?  $experience->end_date = $request->end_date : $experience->end_date=date.now('y-m-d');
        $experience->profile_id = $request->profile_id ;
        $experience->save();

        $msg = __('messages.Experience_Add_Successfully');
        return redirect()->route('experience.index')->with('success',$msg);


    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        $msg = __('messages.Experience_Remove_Successfully');
        return redirect()->route('experience.index')->with('success',$msg);    }
}

