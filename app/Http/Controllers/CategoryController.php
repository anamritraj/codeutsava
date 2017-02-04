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

use App\Category;

class CategoryController extends Controller
{
	public function __construct($value='')
	{

	}

    public function index()
    {
    	$categories = Category::all();
	    return response()->json($categories);
    }
    
    // TODO: Prevent this call by normal users. Only admins can do this.
    public function createCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        try{
            $Category = new Category;

            // To be filled from user request
            $Category->name = $request->name;

            // Save to database.
            $Category->save();

        }catch(Exception $e){
            return response()->json(['Not able to handle your request.'], 500);
        }
        return response()->json($Category);
    }

    // TODO: Prevent this call by normal users. Only admins can do this.
    public function updateCategory(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
            "name" => "required|string"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toArray(), 422);
        }

        try{
            $Category = Category::where('category_id', $request->id)->first();

            // To be filled from user request
            $Category->name = $request->name;
            // Save to database.
            $Category->save();

        }catch(Exception $e){
            return response()->json(['Not able to handle your request.'], 500);
        }
        return response()->json($Category);
    }

    public function getcategory($id)
    {
        try{
            $Category = Category::where('category_id', $id)->first();
        }catch(Exception $e){
            return response()->json(['Not Found'], 404);
        }
        return response()->json($Category);
    }    

    // Do not allow anyone to delete the categorys at any cost
    public function deleteCategory($id)
    {
        try{
            Category::where('category_id', $id)->delete();
        }catch(Exception $e){
            return response()->json(['Not Found'], 404);
        }
        return response()->json(['success' => true]);
    }    
}
