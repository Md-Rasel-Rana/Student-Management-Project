<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacherpage(){
        return view('pages.teacher');
    }
    public function teachercreate (Request $request){
      Teacher::create([
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address')
        ]);
        return response()->json([
            'message'=>'Teacher created successfully',
            'status'=>"success"
        ],201);
    }
    public function teacherdelete(Request $request){
        $id = $request->input('id');
      return Teacher::where('id',$id)->delete();
    }
    public function teacherlist(){
        return Teacher::all();
     }

     public function teacherUpdate(Request $request){
        $id = $request->input('id');
       return Teacher::where('id',$id)->update([
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address')
        ]);

    }
    public function teacherByID(Request $request){
        $id = $request->input('id');
        return Teacher::where('id',$id)->first(); 
    }
}
