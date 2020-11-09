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

$router->get('/reports', 'ReportsController@index');
$router->get('/reports/add', 'ReportsController@add');
$router->post('/reports/add', 'ReportsController@add');
$router->get('/reports/edit/{id}', 'ReportsController@edit');
$router->post('/reports/edit/{id}', 'ReportsController@edit');
$router->get('/reports/show/{id}', 'ReportsController@show');

$router->get('/websites', 'WebsitesController@index');
$router->get('/websites/add', 'WebsitesController@add');
$router->post('/websites/add', 'WebsitesController@add');
$router->get('/websites/edit/{id}', 'WebsitesController@edit');
$router->post('/websites/edit{id}', 'WebsitesController@edit');

$router->get('/meta-information', 'MetasController@index');
