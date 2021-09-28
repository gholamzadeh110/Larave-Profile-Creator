<?php

namespace App\Http\Controllers;

use App\Models\Awards;
use Illuminate\Http\Request;
use Auth;
class AwardsController extends Controller
{

    public function index()
    {
        $profile = Auth::user()->profile()->first();
        $awards = $profile->awards()->get();
        if ($profile){
            return view('Admin.pages.awards.index')->with('profile',$profile)->with('awards',$awards);
        }
    }

    public function store(Request $request)
    {
        $profile = Auth::user()->profile()->first();
        $award = new Awards();
        $validatedData = [
            'description' =>  'required',
            'profile_id' =>  'required',
        ];
        $messages = [
        'description.required' => __('messages.description_required_validation'),
        'profile_id.required' => __('messages.Profile_required_validation'),
        ];
        $this->validate($request, $validatedData, $messages);

        $award->description = $request->description;
        $award->profile_id = $profile->id ;
        $award->save();

        $msg = __('messages.Awards_Add_Successfully');
        return redirect()->route('awards.index')->with('success',$msg);
    }
    public function destroy(Awards $award)
    {
        $award->delete();
        $msg = __('messages.Awards_Remove_Successfully');
        return redirect()->route('awards.index')->with('success',$msg);
    }
}
