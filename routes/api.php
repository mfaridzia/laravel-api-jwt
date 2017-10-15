<?php

use Illuminate\Http\Request;

Route::group(['middleware' => ['api']], function() {

	Route::post('/auth/signup', 'AuthController@signup');
	Route::post('/auth/sigin',  'AuthController@sigin');

	//Route tutorial
	Route::get('/tutorial',      'TutorialController@index');
	Route::get('/tutorial/{id}', 'TutorialController@show');

	// Route test API
	Route::get('/test-api', 'TestingController@testing');
	Route::get('/test-api/{id}', 'TestingController@testing_detail');

	Route::group(['middleware' => ['jwt.auth']], function() {
		Route::get('/profile', 'UserController@profile');

		//Route tutorial
		Route::post('/tutorial',    	'TutorialController@store');
		Route::put('/tutorial/{id}',    'TutorialController@update');
		Route::delete('/tutorial/{id}', 'TutorialController@destroy');

		//Route comment tutorial
		Route::post('/comment/{id_tutorial}','CommentController@store');

	});

});
