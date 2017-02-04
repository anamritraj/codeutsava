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

class ResponseController extends Controller
{
	public function __construct($value='')
	{

	}

    public function index()
    {
    	$Responses = Response::all();
	    return response()->json($Responses);
    }

    public function saveResponse(Request $request)
    {
        $responses  = $request->input();
        foreach ($responses as $response) {

            $R = new Response;
            $R->receipt_id = $response['reciept_id'];
            $R->hospital_id = $response['hospital_id'];
            $R->question_id = $response['itemId'];
            $R->response = $response['rating'];
            $R->save();
        }
        return 1;
    }

    public function getResponseByHosptId($hospital_id)
    {
        try{
            $Responses = Response::where('hosital_id', $hospital_id)->get();
        }catch(Exception $e){
            return response()->json(['Not Found'], 404);
        }
        return response()->json($Responses);
    }       
}
