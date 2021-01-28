<?php
require_once 'vendor/autoload.php';
require_once 'app/database.php';
require_once 'app/Core/Route.php';
require_once 'app/Core/Controller.php';

use app\Core\Route\Route;
Route::run('/', 'Front/HomeController@index');
Route::run('/', 'Front/HomeController@ss', 'post');
Route::run('/uyeler', 'uyeler@index');
Route::run('/uyeler', 'uyeler@post', 'post');
Route::run('/uye/{url}', 'uye@index');
Route::run('/profil/sifre-degistir', 'profile/changepassword@index');