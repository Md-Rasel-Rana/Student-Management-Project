<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function enrollmentpage(){
        return view('pages.enrollment');
    }
    public function enrollmentcreate(Request $request){
        Enrollment::create([
            'batch_id' => $request->input('batch_id'),
            'student_id' => $request->input('student_id'),
            'enroll_no' => $request->input('enroll_no'),
            'enroll_date' => $request->input('enroll_date'),
            'fee' => $request->input('fee'),
        ]);
        return response()->json([
            'status'=>'success',
            'message' => 'Enrollment created successfully.']);
    }
        public function enrollmentlist(){
            return Enrollment::with('student')->get();     
    }
    public function enrollmentdelete(Request $request){
        $id=$request->input('id');
       return Enrollment::where('id',$id)->delete();

    }






}
