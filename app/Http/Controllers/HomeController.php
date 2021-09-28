<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::where('id',1)->with('contacts','experiences','projects','educations','skills','workflows','interests','awards','donates')->first();
        if($profile){
            return view('index',compact('profile'));
        }
    }

    public function Language(Request $request)
    {

    }

    public function show($id)
    {
        $profile = Profile::where('id',"$id")->with('contacts','experiences','projects','educations','skills','workflows','interests','awards','donates')->first();
        if($profile){
            return view('index',compact('profile'));
        }
//        else
//        {
//            $profile = Profile::where('id',1)->with('contacts','experiences','projects','educations','skills','workflows','interests','awards','donates')->first();
//            return view('index',compact('profile'));
//        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
