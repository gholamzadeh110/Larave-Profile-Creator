<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Auth;
class EducationController extends Controller
{

    public function index()
    {
        $profile = Auth::user()->profile()->first();
        $educations = $profile->educations()->get();
        if ($profile){
            return view('Admin.pages.education.index')->with('profile',$profile)->with('educations',$educations);
        }
    }

    public function store(Request $request)
    {
        $profile = Auth::user()->profile()->first();
        $education = new Education();
        $validatedData = [
            'title' =>  'required',
            'description' =>  'required',
            'start_date' =>  'required',
            'end_date' =>  'required',
            'profile_id' =>  'required',
        ];
        $messages = [
            'title.required' => __('messages.title_required_validation'),
            'description.required' => __('messages.description_required_validation'),
            'start_date.required' => __('messages.Start_date_required_validation'),
            'end_date.required' => __('messages.End_date_required_validation'),
            'profile_id.required' => __('messages.Profile_required_validation'),
        ];
        $this->validate($request, $validatedData, $messages);

        $education->title = $request->title;
        $request->subtitle ? $education->subtitle = $request->subtitle:$education->subtitle ="";
        $request->gpa ? $education->GPA = $request->gpa :$education->GPA ="";
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->description = $request->description;
        $education->profile_id = $profile->id ;
        $education->save();

        $msg = __('messages.Education_Add_Successfully');
        return redirect()->route('education.index')->with('success',$msg);
    }

       public function destroy(Education $education)
    {
        $education->delete();
        $msg = __('messages.Education_Remove_Successfully');
        return redirect()->route('education.index')->with('success',$msg);
    }
}
