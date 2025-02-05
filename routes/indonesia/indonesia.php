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
// $router->group(['prefix' => 'kepulauan'], function () use ($router) {
//     $router->get('/', 'cari\CariIndonesiaController@aksiCariKepulauan');
// });

// // provinsi
// $router->group(['prefix' => 'provinsi'], function () use ($router) {
//     $router->get('/', 'ProvinsiController@getSearchData');
// });
// $router->group(['prefix' => 'indonesia'], function () use ($router) {
//     // kepulauan

// });
$router->group(['prefix' => 'api/indonesia', "namespace" => "indonesia"], function () use ($router) {
    $router->group(['prefix' => 'cari'], function () use ($router) {
        $router->get('/provinsi', 'ProvinsiController@getSearchData');
        $router->get('/kepulauan', 'cari\CariIndonesiaController@aksiCariKepulauan');
        // kabupaten
        $router->group(['prefix' => 'kabupaten'], function () use ($router) {
            $router->get('/', 'KabupatenController@getAllData');
            $router->get('/', 'KabupatenController@getSearchData');
        });
    });
});
