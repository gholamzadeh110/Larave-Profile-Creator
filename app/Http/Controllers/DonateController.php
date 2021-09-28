<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use Illuminate\Http\Request;
use Auth;
class DonateController extends Controller
{

    public function index()
    {
        $profile = Auth::user()->profile()->first();
        $donates = $profile->donates()->get();
        if ($profile){
            return view('Admin.pages.donate.index')->with('profile',$profile)->with('donates',$donates);
        }
    }

    public function store(Request $request)
    {
        $profile = Auth::user()->profile()->first();
        $donate = new Donate();
        $validatedData = [
            'title' =>  'required',
            'description' =>  'required',
            'link' =>  'required',
            'profile_id' =>  'required',
        ];
        $messages = [
            'title.required' => __('messages.title_required_validation'),
            'description.required' => __('messages.description_required_validation'),
            'link.required' => __('messages.link_required_validation'),
            'profile_id.required' => __('messages.Profile_required_validation'),
        ];
        $this->validate($request, $validatedData, $messages);

        $donate->title = $request->title;
        $donate->link = $request->link;
        $donate->description = $request->description;
        $donate->profile_id = $profile->id ;
        $donate->save();

        $msg = __('messages.Donate_Add_Successfully');
        return redirect()->route('donate.index')->with('success',$msg);
    }

    public function destroy(Donate $donate)
    {
       $donate->delete();
        return redirect()->route('donate.index');
    }
}
