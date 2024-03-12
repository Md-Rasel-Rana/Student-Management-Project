<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view ('pages.dashboard');
    }
    public function studentpage(){
        return view('pages.student');
    }
    public function studentcreate(Request $request){
       Student::create([
           'name'=>$request->input('name'),
           'phone'=>$request->input('phone'),
           'address'=>$request->input('address')
       ]);
       return response()->json([
        'status' => 'success',
        'message' => 'Student created successfully'
    ],201);
    }
    public function studentlist(){
       return Student::all();
    }

    public function studentByID(Request $request){
        $id = $request->input('id');
         return Student::where('id',$id)->first(); 
    }
    public function studentdelete(Request $request){
        $id = $request->input('id');
      return Student::where('id',$id)->delete();
    }
    public function studentUpdate(Request $request){
        $id = $request->input('id');
       return Student::where('id',$id)->update([
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address')
        ]);

    }









}
