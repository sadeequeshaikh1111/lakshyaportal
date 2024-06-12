<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CandidateBasicDetail;
use Illuminate\View\View;


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
}
