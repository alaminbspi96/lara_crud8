<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    public function index () {
        $students = Student::orderBy('id', 'DESC')->get();
        return view('crud', compact('students'));
    }

    // store data-----------
    public function store (Request $request) {
        $request ->validate([
            'name' => 'required',
            'roll' => 'required',
            'class' => 'required',
        ],[
           'name.required' => 'please input your name',
           'roll.required' => 'please input roll',
           'class.required' => 'please input class'
        ]);

        Student::insert([
            'name' => $request->name,
            'roll' => $request->roll,
            'class' => $request->class,
        ]);

        return redirect()->back()->with('success', 'Data Added Successfully');
    }

    //----student edit data--------
    public function edit($id){
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));
    }
    //------update Student Data----------
    public function update(Request $request, $id){
        Student::findOrFail($id)->update([
            'name' => $request->name,
            'roll' => $request->roll,
            'class' => $request->class,
        ]);

        return redirect()->to('/crud')->with('update', 'Data Updated Successfully');
    }

    //--------destroy student data--------
    public function destroy($id){
        Student::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Data Deleted Successfully');
    }
}
