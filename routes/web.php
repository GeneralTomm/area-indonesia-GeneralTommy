<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/indonesia', "namespace" => "indonesia"], function () use ($router) {
    // kepulauan
    $router->group(['prefix' => 'kepulauan'], function () use ($router) {
        $router->get('/', 'KepulauanController@getAllData');
        $router->get('/q', 'KepulauanController@getSearchData');
        $router->post('/simpan', 'KepulauanController@getPostData');
    });
    // provinsi
    $router->group(['prefix' => 'provinsi'], function () use ($router) {
        $router->get('/', 'ProvinsiController@getAllData');
        $router->get('/q', 'ProvinsiController@getSearchData');
        $router->post('/simpan', 'ProvinsiController@getPostData');
    });

    // kabupaten
    $router->group(['prefix' => 'kabupaten'], function () use ($router) {
        $router->get('/', 'KabupatenController@getAllData');
        $router->get('/q', 'KabupatenController@getSearchData');
        $router->post('/simpan', 'KabupatenController@getPostData');
    });
});

require 'indonesia/indonesia.php';
