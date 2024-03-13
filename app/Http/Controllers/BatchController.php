<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function batchpage(){
        return view('pages.batch');
    }
    public function batchcreate(){
        Batch::create([
            'batch_name'=>request('batch_name'),
            'start_date'=>request('start_date'),
            'course_id'=>request('course_id'),
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'Batch Created Successfully']);
    }
    public function batchlist(){
        return Batch::with('course')->get();
    }
   
    public function batchdelete(Request $request){
        $id = $request->input('id');
       return Batch::where('id',$id)->delete();
    }
    public function batchById(Request $request){
        $id=$request->input('id');
       return Batch::where('id',$id)->first();
    }
    public function batchupdate (Request $request){
        $id=$request->input('id');
        Batch::where('id',$id)->update([
            'batch_name'=>$request->input('batch_name'),
            'start_date'=>$request->input('start_date'),
            'course_id'=>$request->input('course_id'),
        ]);
        
        return response()->json([
            'status'=>'success',
            'message'=>'Batch Updated Successfully']);
    }

}
