<?php
require('./vendor/autoload.php');
use App\configs\Database;
use App\controllers\Controller;

/* dotenv configuration */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

/* database configuration */
$connection = new Database();

/* routing configuration */
$routing = new Controller();

