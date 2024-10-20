<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exam_detail;
use App\Models\applied_exam_detail;
use Illuminate\Support\Facades\DB;

use DataTables;





class Exam_details_controller extends Controller
{
    //
    public function load_exams(Request $request)
    {
    
        $exams = exam_detail::distinct()->pluck('exam_name');
        return $exams;

        
    }

    public function apply_exam(Request $request)
    {  
            $validatedData = $request->validate([
            'user_id'=>'required|string',
            'exam_name'=>'required|string',
            'email'=>'required|string'

        ]);

        
        try
        {


        $Fees_detail=exam_detail::where('exam_name', $validatedData['exam_name'])->pluck('Fees_details');

        $category = request()->session()->get('basicDetails.Category');

        $Fees_detail = json_decode($Fees_detail[0], true);  

        $fees=$Fees_detail[$category];
 
            $Applyexam = new applied_exam_detail();
            $Applyexam->user_id = $validatedData['user_id'];
            $Applyexam->email=$validatedData['email'];
            $Applyexam->Payment_Status="pending";
            $Applyexam->exam_name=$validatedData['exam_name'];
            $Applyexam->Fees=$fees;
            $Applyexam->save();

            return response()->json([
                'message' => ' Applied successfully',
                'data' => $request->all() // Including the entire request data
            ], 200);
        }
        catch(exception $e)
        {

            return $e;
        }
        return response()->json(['message' => 'Educational details saved successfully'], 200);

    }


    public function fetch_applied_exams(Request $request)
    {
        $user_id=$request->user_id;
        $data=applied_exam_detail::where('user_id', $user_id)->get();

        return DataTables::of($data)->addColumn('action', function($data) {
            // Pass the actual $data->id directly into the onclick function
            $btn = '<a type="button" class="btn btn-danger btn-sm" onclick="Delete_applied_exam('.$data->Id.')">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
        
        
    } 




    public function Delete_applied_exam(Request $request)
    {
    try{
        $data=applied_exam_detail::findorfail($request->id);
        $x=$data;
        $data->forceDelete();
        $deleted = DB::table('applied_exam_details')->where('id', $request->id)->delete();

        return response()->json(['message' => 'Record deleted successfully yes','jsonresp'=>$x], 200);
    
    }
    catch(Exception $e) 
    {
        return response()->json(['message' => 'Record not found or could not be deleted', 'error' => $e->getMessage()], 400);
        
    }}
    

}



