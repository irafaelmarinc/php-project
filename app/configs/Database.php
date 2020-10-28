<?php

namespace App\configs;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    function __construct () {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => $_ENV['DB_CONNECTION'],
            'host'      => $_ENV['DB_HOST'],
            'port'      => $_ENV['DB_PORT'],
            'database'  => $_ENV['DB_DATABASE'],
            'username'  => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD'],
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}