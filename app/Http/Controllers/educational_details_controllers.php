<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidateBasicDetail;
use App\Models\educational_detail;

use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class educational_details_controllers extends Controller
{
    //
    public function save_edu_details(Request $request)
    {

        $validatedData = $request->validate([
            'universityBoard' => 'required|string',
            'collegeInstitute' => 'required|string',
            'cgpaPercentage' => 'required|string',
            'yearOfPassing' => 'required|numeric',
            'course' => 'required|string',
            'edu_category'=>'required|string',
            'course'=>'required|string'
        ]);
        try
        {
            $eduDetail = new EducationalDetail();
            $eduDetail->university_board = $validatedData['universityBoard'];
            $eduDetail->college_institute = $validatedData['collegeInstitute'];
            $eduDetail->cgpa_percentage = $validatedData['cgpaPercentage'];
            $eduDetail->year_of_passing = $validatedData['yearOfPassing'];
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
