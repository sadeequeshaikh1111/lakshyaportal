<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidateBasicDetail;
use App\Models\educational_detail;
use Illuminate\Support\Facades\Session; // Make sure to import the Session facade


use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class educational_details_controllers extends Controller
{
    //
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
            'email'=>'required|string'
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
}
