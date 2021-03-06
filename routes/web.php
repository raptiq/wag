<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->group(['prefix' => 'api'], function($app) {

    $app->get('dogs','DogController@index');
    
    $app->get('dogs/{id}','DogController@getDog');
    
    $app->post('dogs','DogController@createDog');
    
    $app->put('dogs/{id}','DogController@updateDog');
    
    $app->delete('dogs/{id}','DogController@deleteDog');
});
