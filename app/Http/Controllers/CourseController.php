<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function coursepage(){
        return view('pages.course');
    }
    public function coursecreate(Request $request){
        Course::create([
            'name'=>$request->input('cname'),
            'syllabus'=>$request->input('csyllabus'),
            'duration'=>$request->input('cduration'),

        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'Course created successfully'],201);
    }
    public function courselist(){
       return Course::all();
    }
    public function coursedelete(Request $request){
        $id = $request->input('id');
       return Course::where('id',$id)->delete();
    }
    public function courseupdate (Request $request){
        $id=$request->input('id');
        Course::where('id',$id)->update([
            'name'=>$request->input('name'),
            'syllabus'=>$request->input('syllabus'),
            'duration'=>$request->input('duration'),
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'Course updated successfully'
        ]);

    }
    public function courseByID(Request $request){
        $id=$request->input('id');
      return  Course::where('id',$id)->first();
    }


}
