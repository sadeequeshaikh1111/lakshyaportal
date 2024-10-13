<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidateBasicDetail;
use App\Models\educational_detail;
use Illuminate\Support\Facades\Session; // Make sure to import the Session facade
use DataTables;


use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class educational_details_controllers extends Controller
{
    //

    public function get_eduDetails($email,$flag)
    {
     
        // Assuming you are getting the user's ID from the session or request
     if($flag==0)
        {  try{ 
        $userId =$email; // or however you are identifying the user
        $user = educational_detail::where('email', $email)->get();
       // $user = EducationalDetail::where('email', $email)->first();

        return $user;
       }
       catch(Exception $e)
       {
        return $e;
       }
    }
    else
    {

        $data=educational_detail::where('email', $email)->get();

return DataTables::of($data)
->addColumn('action', function($row){
$btn ='<button type="button" name="delete_btn" id='.$data->id.' class="btn btn-primary btn-sm"  onclick=Delete(this.id)>Delete</button> ';
return $btn;
})
->rawColumns(['action'])
->make(true);
}


    }

    
    public function get_eduDetails_ajax(Request $request)
    {
        $user_id=$request->user_id;
        $data=educational_detail::where('user_id', $user_id)->get();

        return DataTables::of($data)->addColumn('action', function($data){
        $btn = '<a type="button" id='.$data->id.' class="btn btn-danger btn-sm" onclick=Delete(this.id)>Delete</a>';
        return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
        
    }





    public function save_edu_details(Request $request)
    {



        $email = Session::get('email'); // Retrieve email from session
       
        $validatedData = $request->validate([
            'universityBoard' => 'required|string',
            'collegeInstitute' => 'required|string',
            'cgpaPercentage' => 'required|string',
            'yearOfPassing' => 'required|numeric',
            'course' => 'required|string',
            'edu_category'=>'required|string',
            'course'=>'required|string',
            'email'=>'required|string',
            'user_id'=>'required|string'
        ]);
        try
        {
            $eduDetail = new educational_detail();
            $eduDetail->university_board = $validatedData['universityBoard'];
            $eduDetail->college_institute = $validatedData['collegeInstitute'];
            $eduDetail->cgpa_percentage = $validatedData['cgpaPercentage'];
            $eduDetail->passing_year = $validatedData['yearOfPassing'];
            $eduDetail->edu_category = $validatedData['edu_category'];
            $eduDetail->course = $validatedData['course'];
            $eduDetail->email=$validatedData['email'];
            $eduDetail->user_id=$validatedData['user_id'];
            $eduDetail->save();
            return response()->json([
                'message' => 'Educational details saved successfully',
                'data' => $request->all() // Including the entire request data
            ], 200);
        }
        catch(exception $e)
        {

            return $e;
        }
        return response()->json(['message' => 'Educational details saved successfully'], 200);

    }
public function delete_edu_detail(Request $request)
{
try{
    $data=educational_detail::findorfail($request->id);
    $data->delete();
    return response()->json(['message' => 'Record deleted successfully'], 200);

}
catch(Exception $e)
{
    return response()->json(['message' => 'Record not found or could not be deleted', 'error' => $e->getMessage()], 400);
    
}

}

}



