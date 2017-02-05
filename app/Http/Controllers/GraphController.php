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

use App\Response;
use App\Hospital;
use App\Question;
use App\District;
use App\State;
use App\User;
use App\Category;

class GraphController extends Controller
{
	public function __construct($value='')
	{

	}

    public function index()
    {
    	
    }

    public function getDistricts()
    {
        $Districts = District::all();
        return response()->json($Districts);   
    }

    public function getHospitals($district_id)
    {
        $hospitals = Hospital::where('district_id', $district_id)->get();
        return response()->json($hospitals);
    }


    // Hospitals Data
    public function GetYearlyOverallDataHospitals($hospital_id)
    {
            $date = date("Y/m/d");
            for ($i=1; $i <= 12; $i++) {
                $to = $date;    
                $from = date("Y/m/d", strtotime('-1 month', strtotime($date)));
                $Responses[$i] = Response::whereBetween('created_at', [$from, $to])->where('hospital_id', $hospital_id)->avg('response');
                $date = $from;
            }
            $response = array();

            foreach ($Responses as $Response) {
                array_push($response, $Response);
            }
            return response($response);
    }
}
