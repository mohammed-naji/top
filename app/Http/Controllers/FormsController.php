<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function form1()
    {
        return view('forms.form1');
    }

    public function form1_submit(Request $request)
    {
        // dd($request->all());
        // $name = $request->input('name');
        $name = htmlspecialchars($request->name);
        $age = htmlspecialchars($request->age);

        return "Welcome $name, your age is $age";
    }

    public function form2()
    {
        return view('forms.form2');
    }

    public function form2_submit(Request $req)
    {
        $name = $req->name;
        $cv = $req->cv;

        // pic.png
        // 547887555_4545755_96544782_pic.png
        $new_name = rand(00000000000000,99999999999999).'_'.time().'_'.rand().'_'.$req->file('cv')->getClientOriginalName();

        $req->file('cv')->move(public_path('uploads/cv'), $new_name);
        // move_uploaded_file();
    }
}
