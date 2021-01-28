<?php
require_once 'vendor/autoload.php';
require_once 'app/database.php';
require_once 'app/Core/Route.php';
require_once 'app/Core/Controller.php';

use app\Core\Route\Route;
Route::run('/', 'Front/HomeController@index');
