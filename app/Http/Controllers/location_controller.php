<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\State;


use Illuminate\Http\Request;

class location_controller extends Controller
{
    //
    public function get_Locations($type, Request $request)
    {
        //.$parentId = $request->input('parentId');
        try{

            if($type=="countries")

        {$countries = Country::select('id', 'name')->get();
                return $countries;
                        }

            else if($type=="states")   {

                $parentId = $request->input('parentId');
                $states = State::where('country_id', $parentId)->pluck('name', 'id');
                return response()->json($states);
            }         

                return "invalid parameter";
        }
        catch(exception $e)
        {

            return $e;
        }
    }


}
