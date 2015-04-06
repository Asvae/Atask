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

Route::get('about', 'PagesController@about');

// usage inside a laravel route
Route::get('image', function()
{
    $image_path = base_path().'/resources/images/';
    $img = Image::make($image_path.'foo.jpg')
        ->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });

    return $img->response('jpg');
});

Route::get('contact', 'PagesController@contact');

Route::get('tasks/db', ['middleware' => 'auth', 'uses' => 'TasksController@showAll']);
Route::resource('tasks','TasksController');

Route::get('/', 'HomeController@index');
Route::get('demo', 'HomeController@bootstrap_demo');
Route::get('phpinformation', 'HomeController@phpinformation');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);