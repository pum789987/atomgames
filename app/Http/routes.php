<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* template */
Route::get('index',['as' => 'index','uses'=>'template\templateController@index']);
Route::get('charts', ['as' => 'charts','uses'=>'template\templateController@charts']);
Route::get('forms', ['as' => 'forms','uses'=>'template\templateController@forms']);
Route::get('icons', ['as' => 'icons','uses'=>'template\templateController@icons']);
Route::get('tables', ['as' => 'tables','uses'=>'template\templateController@tables']);
Route::get('loginT', ['as' => 'loginT','uses'=>'template\templateController@loginT']);
Route::get('registerT', ['as' => 'registerT','uses'=>'template\templateController@registerT']);

/* check */
Route::get('check-connect',function(){
    if(DB::connection()->getDatabaseName())
    {
        return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
    }else{
        return 'Connection False !!';
    }

});

/* ระบบ */
/* --------------home------------*/
Route::get('home',['as' => 'home','uses'=>'Home\homeController@home']);

/* --------------registration------------*/
Route::get('register',['as' => 'register','uses'=>'Registration\registerController@register']);
Route::get('register/getPrename',['as' => 'register/getPrename','uses'=>'Registration\registerController@getPrename']);
Route::get('register/getExistsUser',['as' => 'register/getExistsUser','uses'=>'Registration\registerController@getExistsUser']);

/* --------------sportAndActivities------------*/
Route::get('createSchedule',['as' => 'createSchedule','uses'=>'SportsAndActivities\sportsAndActivitiesController@formSchedule']);
Route::get('createSchedule/getNameOfSnA',['as' => 'createSchedule/getNameOfSnA','uses'=>'SportsAndActivities\sportsAndActivitiesController@getNameOfSnA']);
Route::get('createSchedule/get_teamTotal',['as' => 'createSchedule/get_teamTotal','uses'=>'SportsAndActivities\sportsAndActivitiesController@get_teamTotal']);
Route::get('createSchedule/get_round',['as' => 'createSchedule/get_round','uses'=>'SportsAndActivities\sportsAndActivitiesController@get_round']);
Route::get('createSchedule/get_Competing',['as' => 'createSchedule/get_Competing','uses'=>'SportsAndActivities\sportsAndActivitiesController@get_Competing']);
Route::get('createSchedule/get_NType',['as' => 'createSchedule/get_NType','uses'=>'SportsAndActivities\sportsAndActivitiesController@get_NType']);
Route::post('insert_Schedule',['as' => 'insert_Schedule','uses'=>'SportsAndActivities\sportsAndActivitiesController@insert_Schedule']);
Route::post('update_Schedule',['as' => 'update_Schedule','uses'=>'SportsAndActivities\sportsAndActivitiesController@update_Schedule']);
Route::get('allSchedule/{types_of_S?}/{format?}',['as' => 'allSchedule','uses'=>'SportsAndActivities\sportsAndActivitiesController@allSchedule']);
Route::post('allSchedule_functions',['as' => 'allSchedule_functions','uses'=>'SportsAndActivities\sportsAndActivitiesController@allSchedule_functions']);
Route::get('detailsSchedule',['as' => 'detailsSchedule','uses'=>'SportsAndActivities\sportsAndActivitiesController@detailsSchedule']);