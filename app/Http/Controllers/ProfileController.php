<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use  Image;
use Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $profile = Auth::user()->profile()->first();
        $contacts = $profile->contacts()->get();
        $avatars = ["fab fa-linkedin-in","fab fa-github","fab fa-twitter","fab fa-facebook",
            "fas fa-address-book", "far fa-address-book",
            "fas fa-address-card", "far fa-address-card",
            "fab fa-vimeo","fab fa-amazon",
            "fab fa-apple",
        ];
        if ($profile){
            return view('Admin.pages.profile.index')->with('profile',$profile)->with('contacts',$contacts)->with('avatars',$avatars);
        }
    }

    public function store(Request $request)
    {
        $profile = Profile::where('id',$request->id)->first();
        if( $profile){
            if (!empty($request->profile_image) ) {
                $imageName = time() . '.' . $request->profile_image->extension();
                $request->profile_image->move(public_path('/uploads/profiles/'), $imageName);
                $profile->image = $imageName;
            }
            $validatedData = [
                'email' =>  'email',
            ];
            $messages = [
                'email.email' => __('messages.email_validation')
            ];
            $this->validate($request, $validatedData, $messages);

            $request->name ?  $profile->name = $request->name:$profile->name = '';
            $request->family ?   $profile->family = $request->family: $profile->family='';
            $request->mobile ?  $profile->mobile = $request->mobile : $profile->mobile='';
            $request->email ?  $profile->email = $request->email: $profile->email='';
            $request->address ? $profile->address = $request->address: $profile->address='';
            $request->description ? $profile->description = $request->description: $profile->description='';
            $profile->save();

            $msg = __('messages.update_correctly_completed');
            return redirect()->route('profile.index')->with('success',$msg);
        }
        else{
            abort(403);
        }
    }

    public function destroy($id)
    {
        //
    }
}
