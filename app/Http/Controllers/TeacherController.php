<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->has('keyword')) {
            // return request()->keyword;
            $teachers = Teacher::where('name', 'like', '%'.request()->keyword.'%')->paginate(5);
        }else {
            $teachers = Teacher::paginate(5);
        }

        // $teachers = Teacher::simplePaginate(5);
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:teachers,email',
            'phone' => 'required',
        ]);

        // upload file

        // store data
        $teacter = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        if($teacter) {
            return redirect()->route('teachers.index')->with('msg', 'Teacher added successfully')->with('type', 'success')->with('icon', 'success');
        }else {
            return redirect()->route('teachers.index')->with('msg', 'Teacher not added')->with('type', 'danger')->with('icon', 'error');
        }

        // return with message

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        // if(!$teacher) {
        //     abort(404);
        // }
        // $teacher = Teacher::where('id', $id)->first();
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:teachers,email',
            'phone' => 'required',
        ]);

        $teacher = Teacher::findOrFail($id);

        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('teachers.index')->with('msg', 'Teacher updated successfully')->with('type', 'info')->with('icon', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::destroy($id);
        // $item = Teacher::find($id);

        // $image = $item->image;
        // unlink($image);

        // $item->delete();
        return redirect()->route('teachers.index')->with('msg', 'Teacher deleted successfully')->with('type', 'danger')->with('icon', 'error');
    }
}
