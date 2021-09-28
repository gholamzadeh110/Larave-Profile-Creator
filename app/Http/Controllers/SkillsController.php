<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Illuminate\Http\Request;
use Auth;
class SkillsController extends Controller
{

    public function index()
    {
        $profile = Auth::user()->profile()->first();
        $workflows = $profile->workflows()->get();
        $skills = $profile->skills()->get();
        $avatars = ["fab fa-android","fab fa-github","fab fa-twitter","fab fa-facebook",
            "fas fa-address-book", "far fa-address-book",
            "fas fa-address-card", "far fa-address-card",
            "fab fa-vimeo","fab fa-amazon",
            "fab fa-apple",
        ];
        if ($profile){
            return view('Admin.pages.skills.index')->with('profile',$profile)
                ->with('skills',$skills)->with('avatars',$avatars)->with('workflows',$workflows);
        }
    }

    public function store(Request $request)
    {
        $profile = Auth::user()->profile()->first();
        $skill = new Skills();
        $validatedData = [
            'skill' =>  'required',
            'percent' =>  'required',
            'avatar' =>  'required',
        ];
        $messages = [
            'skill.required' => __('messages.Skill_required_validation'),
            'percent.required' => __('messages.Percent_required_validation'),
            'avatar.required' => __('messages.Avatar_required_validation'),
        ];
        $this->validate($request, $validatedData, $messages);

        $skill->skill = $request->skill;
        $skill->percent = $request->percent;
        $skill->avatar = $request->avatar;
        $skill->state = 1;
        $skill->profile_id = $profile->id ;
        $skill->save();

        $msg = __('messages.Skill_Add_Successfully');
        return redirect()->route('skills.index')->with('success',$msg);
    }

        public function destroy(Skills $skill)
    {
        $skill->delete();
        $msg = __('messages.Skill_Remove_Successfully');
        return redirect()->route('skills.index')->with('success',$msg);
    }
}
