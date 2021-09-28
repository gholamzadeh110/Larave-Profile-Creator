<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Profile;
use Illuminate\Http\Request;
use Auth;

class ContactsController extends Controller
{
//    public function index()
//    {
//        $profile = Auth::user()->profile()->first();
//        $contacts = $profile->contacts()->get();
//        $avatars = ["fab fa-linkedin-in","fab fa-github","fab fa-twitter","fab fa-facebook",
//            "fas fa-address-book", "far fa-address-book",
//            "fas fa-address-card", "far fa-address-card",
//           "fab fa-vimeo","fab fa-amazon",
//            "fab fa-apple",
//           ];
//        if ($profile){
//            return view('Admin.pages.profile.index')->with('profile',$profile)->with('contacts',$contacts)->with('avatars',$avatars);
//        }else
//        {
//            abort(403);
//        }
//    }

    public function store(Request $request)
    {
        $profile = Auth::user()->profile()->first();
        $contacts = new Contacts();
        $validatedData = [
            'title' =>  'required',
            'link' =>  'required',
            'profile_id' =>  'required',
        ];
        $messages = [
            'title.required' => __('messages.title_required_validation'),
            'link.required' => __('messages.link_required_validation'),
            'profile_id.required' => __('messages.Profile_required_validation'),
        ];
        $this->validate($request, $validatedData, $messages);
        $contacts->title = $request->title;
        $contacts->link = $request->link;
        $contacts->avatar = $request->avatar;
        $contacts->profile_id = $profile->id ;
        $contacts->save();

        $msg = __('messages.Awards_Add_Successfully');
        return redirect()->route('profile.index')->with('success',$msg);
    }
    public function destroy(Contacts $contact)
    {
        $contact->delete();
        return redirect()->route('profile.index');
    }
}
