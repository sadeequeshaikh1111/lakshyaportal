<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\State;
use App\Models\District;



use Illuminate\Http\Request;

class location_controller extends Controller
{
    //
    public function get_Locations($type, Request $request)
    {
        //.$parentId = $request->input('parentId');
        try{

            if($type=="countries")
        
            {
                $countries = Country::select('id', 'name')->get();
                return $countries;
                       
            }

            else if($type=="states")   {

                $parentId = $request->input('parentId');
                $states = State::select('id', 'name')->where('country_id', $parentId)->get();
                return $states;
            }  
            
            else if($type=="districts")
            {
                $country_id=$request->input('countryId');
                $state_id=$request->input('stateId');
                $Districts=District::select('id','name')->where('country_id',$country_id)->where('state_id',$state_id)->get();
                return $Districts;

            }


                return "invalid parameter";
        }
        catch(exception $e)
        {

            return $e;
        }
    }


}
