<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Input;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use AppHttpRequests;
use App\Http\Controllers\Controller;

use Exception;

use App\Hospital;

class HospitalController extends Controller
{
	public function __construct($value='')
	{

	}

    public function index()
    {
    	$Hospitals = Hospital::all();
	    return response()->json($Hospitals);
    }

    public function getHospital($hospital_id)
    {
        try{
            $Hospitals = Hospital::where('id', $hospital_id)->get();
        }catch(Exception $e){
            return response()->json(['Not Found'], 404);
        }
        return response()->json($Hospitals);
    }       
}
