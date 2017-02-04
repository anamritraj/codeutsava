<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'api'], function()
{
	//////////////////////
	// Questions Routes //
	//////////////////////

    // Get All Questions
    Route::get('question', 'QuestionController@index');
    
    // Get Category Questions
    Route::get('question/{category_id}', 'QuestionController@getQuestion');
    
    /////////////////////
    // Category Routes //
    /////////////////////
	
	// Get All categories
    Route::get('category', 'CategoryController@index');
    
	// Get category by id
    Route::get('category/{id}', 'CategoryController@getCategory');
    
	// Update Category
    Route::put('category', 'CategoryController@updateCategory');
    
    // Create Category
    Route::post('category', 'CategoryController@createCategory');
    
    // Delete Category
    Route::delete('category/{id}', 'CategoryController@deleteCategory');

    ////////////////
    // UserRoutes //
    ////////////////
	
    // Add user
    Route::post('user', 'UserController@createUser');

    // Get user
    Route::get('user/{aadhar_no}', 'UserController@getUser'); 

    /////////////////////
    // Hospital Routes //
    /////////////////////
    
	// Get hospital
    Route::get('hospital/{hospital_id}', 'HospitalController@getHospital'); 

    //////////////////////////
    // Response Controllers //
    //////////////////////////
    
    
});

