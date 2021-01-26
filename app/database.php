<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'username' => 'root',
    'password' => '',
    'database' => 'elan',
    'charset' => 'utf8',
    'collaction' => 'utf8_unicode_ci',
    'prefix' => ''
]);
$capsule->bootEloquent();