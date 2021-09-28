<?php

namespace App\Http\Controllers;

use App\Models\Interests;
use Illuminate\Http\Request;
use Auth;
class InterestsController extends Controller
{

    public function index()
    {
        $profile = Auth::user()->profile()->first();
        $interests = $profile->interests()->get();
        if ($profile){
            return view('Admin.pages.interests.index')->with('profile',$profile)->with('interests',$interests);
        }
    }

    public function store(Request $request)
    {
        $profile = Auth::user()->profile()->first();
        $interests = new Interests();
        $validatedData = [
            'description' =>  'required',
            'profile_id' =>  'required',
        ];
        $messages = [
            'description.required' => __('messages.description_required_validation'),
            'profile_id.required' => __('messages.Profile_required_validation'),
        ];
        $this->validate($request, $validatedData, $messages);

        $interests->description = $request->description;
        $interests->profile_id = $profile->id ;
        $interests->save();

        $msg = __('messages.Interest_Add_Successfully');
        return redirect()->route('interests.index')->with('success',$msg);
    }

    public function destroy(Interests $interest)
    {
        $interest->delete();
        $msg = __('messages.Interest_Remove_Successfully');
        return redirect()->route('interests.index')->with('success',$msg);
    }
}
