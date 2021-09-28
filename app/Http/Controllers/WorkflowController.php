<?php

namespace App\Http\Controllers;

use App\Models\workflow;
use Illuminate\Http\Request;
use Auth;
class WorkflowController extends Controller
{
//    public function index()
//    {
//        $profile = Auth::user()->profile()->first();
//        $workflows = $profile->workflows()->get();
//        if ($profile){
//            return view('Admin.pages.skill.index')->with('profile',$profile)->with('workflows',$workflows);
//        }
//    }

    public function store(Request $request)
    {

        $profile = Auth::user()->profile()->first();
        $workflow = new workflow();
        $validatedData = [
            'description' =>  'required',
        ];
        $messages = [
            'description.required' => __('messages.description_required_validation'),
        ];
        $this->validate($request, $validatedData, $messages);

        $workflow->description = $request->description;
        $workflow->profile_id = $profile->id ;
        $workflow->save();

        $msg = __('messages.Workflow_Add_Successfully');
        return redirect()->route('skills.index')->with('success',$msg);
    }

    public function destroy(workflow $workflow)
    {
        $workflow->delete();
        $msg = __('messages.Workflow_Remove_Successfully');
        return redirect()->route('skills.index')->with('success',$msg);
    }
}
