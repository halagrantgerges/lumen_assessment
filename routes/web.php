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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/api/v1/', function () use ($router) {
    return "we are good";
});


//
$router->post('/api/v1/product/', 'ProductController@createProduct');

$router->get('/api/v1/product/', 'ProductController@displayAll');
$router->post('/api/v1/order/', 'OrderController@manageOrder');
