<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidateBasicDetail;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;




class basic_details_controller extends Controller
{
    //
    public function getBasicDetails(Request $request)
    {
        // Assuming you are getting the user's ID from the session or request
       try{ 
        $email = auth()->user()->email;// or however you are identifying the user
       
       $sessiondata= $request->session()->get('basicDetails');
       $user_id = $sessiondata->User_id;
        $user =  CandidateBasicDetail::where('user_id', $user_id)->first();
        

        //$user =  CandidateBasicDetail::where('email', $email)->first();
        return $user;

       }
       catch(Exception $e)
       {
        return "error ".$e;
       }
    }

    public function save_basic_details(Request $request)
    {
        try
        {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'permanent_address' => 'required|string',
            'gender' => 'required|string|in:Male,Female,Other',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'taluka' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
            'exam_location_1' => 'required|string|max:255',
            'exam_location_2' => 'required|string|max:255',
            'exam_location_3' => 'required|string|max:255',
            'user_id' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Retrieve the basic details entry for the given email, or create a new one
        $basicDetails = CandidateBasicDetail::updateOrCreate(
            ['user_id' => $request->input('user_id')],
            [
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name'),
                'mother_name' => $request->input('mother_name'),
                'date_of_birth' => $request->input('dob'),
                'permanent_address' => $request->input('permanent_address'),
                'gender' => $request->input('gender'),
                'country' => $request->input('country'),
                'state' => $request->input('state'),
                'district' => $request->input('district'),
                'taluka' => $request->input('taluka'),
                'mobile_number' => $request->input('mobile_number'),
                'preferred_exam_location_1' => $request->input('exam_location_1'),
                'preferred_exam_location_2' => $request->input('exam_location_2'),
                'preferred_exam_location_3' => $request->input('exam_location_3')                
            ]
        );
        $user_details = User::updateOrCreate(
            ['email' => $request->input('email')],
            ['Basic_details_status' => "Updated"]
        );

        //session('basicDetails')['date_of_birth']

        


    
        // Flash basicDetails to the session
        $request->session()->put('basicDetails', $basicDetails);


        return response()->json(['message' => 'Basic details & user saved successfully', 'data' => $user_details, 'basicDetails' => $basicDetails], 200);



      
        }
        catch(Exception $e)
        {
            return $e;
        }




    }

}
