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

use App\User;

class UserController extends Controller
{
	public function __construct($value='')
	{

	}

    public function index()
    {
    	$Users = User::all();
	    return response()->json($Users);
    }
    
    // TODO: Prevent this call by normal users. Only admins can do this.
    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|unique:users,mobile|digits:10',
            'adhar_id' => 'required|string|unique:users',
            'unique_token' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        try{
            $User = new User;
            // To be filled from user request
            $User->name = $request->name;
            $User->email = $request->email;
            $User->mobile = $request->mobile;
            $User->adhar_id = $request->adhar_id;
            $User->unique_token = $request->unique_token;
            // Save to database.
            $User->save();

        }catch(Exception $e){
            return response()->json(['Not able to handle your request.'], 500);
        }
        return response()->json($User);
    }

    // TODO: Prevent this call by normal users. Only admins can do this.
    public function updateUser(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
            "name" => "required|string"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        try{
            $User = User::where('User_id', $request->id)->first();

            // To be filled from user request
            $User->name = $request->name;
            // Save to database.
            $User->save();

        }catch(Exception $e){
            return response()->json(['Not able to handle your request.'], 500);
        }
        return response()->json($User);
    }

    public function getUser($adhar_id)
    {
        try{
            $Users = User::where('adhar_id', $adhar_id)->get();
        }catch(Exception $e){
            return response()->json(['Not Found'], 404);
        }
        return response()->json($Users);
    }       
}
