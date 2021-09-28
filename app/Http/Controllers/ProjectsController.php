<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Projects;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Project;
use Auth;

class ProjectsController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->profile()->first();
        $projects = $profile->projects()->get();
        return view('Admin.pages.projects.index')->with('profile',$profile)->with('projects',$projects);
    }
    public function store(Request $request)
    {
        $project = new Projects();
        $validatedData = [

            'project_image' =>  'required',
            'title' =>  'required',
            'profile_id' =>  'required',
        ];
        $messages = [
            'project_image.required' => __('messages.image_required_validation'),
            'title.required' => __('messages.title_required_validation'),
            'profile_id.required' => __('messages.Profile_required_validation'),
        ];
        $this->validate($request, $validatedData, $messages);
        if (!empty($request->project_image) ) {
            $imageName = time() . '.' . $request->project_image->extension();
            $request->project_image->move(public_path('/uploads/projects/'), $imageName);
            $project->image = $imageName;
        }
        $request->title ?  $project->title = $request->title:$project->title = '';
        $request->link ?   $project->link = $request->link: $project->link='';
        $request->description ?  $project->description = $request->description : $project->description='';
        $project->profile_id = $request->profile_id ;
        $project->save();

            $msg = __('messages.Project_Add_Successfully');
            return redirect()->route('projects.index')->with('success',$msg);
    }

    public function destroy(Projects $projects)
    {
        $projects->delete();
        $msg = __('messages.Project_Remove_Successfully');
        return redirect()->route('projects.index')->with('success',$msg);    }
}
