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

use App\Question;

class QuestionController extends Controller
{
	public function __construct($value='')
	{

	}

    public function index()
    {
    	$questions = Question::all();
	    return response()->json($questions);
    }
    
    // TODO: Prevent this call by normal users. Only admins can do this.
    public function createQuestion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        try{
            $Question = new Question;

            // To be filled from user request
            $Question->name = $request->name;

            // Save to database.
            $Question->save();

        }catch(Exception $e){
            return response()->json(['Not able to handle your request.'], 500);
        }
        return response()->json($Question);
    }

    // TODO: Prevent this call by normal users. Only admins can do this.
    public function updateQuestion(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
            "name" => "required|string"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        try{
            $Question = Question::where('Question_id', $request->id)->first();

            // To be filled from user request
            $Question->name = $request->name;
            // Save to database.
            $Question->save();

        }catch(Exception $e){
            return response()->json(['Not able to handle your request.'], 500);
        }
        return response()->json($Question);
    }

    public function getQuestion($category_id)
    {
        try{
            $Questions = Question::where('category_id', $category_id)->where('isValid', 1)->get();
        }catch(Exception $e){
            return response()->json(['Not Found'], 404);
        }
        return response()->json($Questions);
    }       
}
