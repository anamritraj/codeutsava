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
	/////////////////
	// User Routes //
	/////////////////

	// Authenticate User
    Route::post('authenticate', 'UserController@authenticate');
    
    // Get user
    Route::get('user', 'UserController@getUser');
    
    // Register a new User
    Route::post('register', 'UserController@register');
    
    // Update user Events
    Route::post('user/events', 'UserController@updateUserEvents');

    /////////////////
    //Event Routes //
    /////////////////
    
    // Get All events
    Route::get('event', 'EventController@index');

	// Get event by event_slug
    Route::get('event/{event_slug}', 'EventController@getEvent');

    // Create a new Event
    Route::post('event', 'EventController@createEvent');

    // Update Event
    Route::put('event', 'EventController@updateEvent');
    
    // Delete Event
    // Note to self: Do not allow anyone to delete the events.
    Route::delete('event/{event_slug}', 'EventController@deleteEvent');

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
    
});

