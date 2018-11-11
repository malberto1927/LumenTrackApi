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

$router->group(['prefix' => 'tracks'], function () use ($router) {
    $router->get('/', 'TrackController@index');
    $router->post('/', 'TrackController@store');
    $router->get('/{id}', 'TrackController@show');
    $router->put('/{id}', 'TrackController@update');
    $router->patch('/{id}', 'TrackController@update');
    $router->delete('/{id}', 'TrackController@destroy');
});