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
//echo  "aa";exit;
$path = '/51/public/';
$app->get($path.'/', function () use ($app) {
    return $app->welcome();
});
$app->post($path.'site/login', 'SiteController@login');
$app->post($path.'site/logout', 'SiteController@logout');
$app->get($path.'site/is_login', 'SiteController@isLogin');
$app->get($path.'site/captcha', 'SiteController@captcha');
$app->get($path.'export/index', 'ExportController@index');
$app->get($path.'common/line_chart', 'CommonController@lineChart');