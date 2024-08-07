<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidateBasicDetail;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;



class basic_details_controller extends Controller
{
    //
    public function getBasicDetails(Request $request)
    {
        // Assuming you are getting the user's ID from the session or request
       try{ 
        $userId = auth()->id(); // or however you are identifying the user
        $user = CandidateBasicDetail::find($userId);
        return $user;
       }
       catch(Exception $e)
       {
        return $e;
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
            'exam_location_3' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Retrieve the basic details entry for the given email, or create a new one
        $basicDetails = CandidateBasicDetail::updateOrCreate(
            ['email' => $request->input('email')],
            [
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name'),
                'mother_name' => $request->input('mother_name'),
                'dob' => $request->input('dob'),
                'permanent_address' => $request->input('permanent_address'),
                'gender' => $request->input('gender'),
                'country' => $request->input('country'),
                'state' => $request->input('state'),
                'district' => $request->input('district'),
                'taluka' => $request->input('taluka'),
                'mobile_number' => $request->input('mobile_number'),
                'exam_location_1' => $request->input('exam_location_1'),
                'exam_location_2' => $request->input('exam_location_2'),
                'exam_location_3' => $request->input('exam_location_3')
            ]
        );
        $user_details = User::updateOrCreate(
            ['email' => $request->input('email')],
            ['Basic_details_status' => "Updated"]
        );
        return response()->json(['message' => 'Basic details & user saved successfully', 'data' => $user_details, 'basicDetails' => $basicDetails], 200);



      
        }
        catch(Exception $e)
        {
            return $e;
        }




    }

}
