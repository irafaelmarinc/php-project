<?php

namespace App\controllers;

class Controller
{
    function __construct() {
        $controller = "Home";
        $action     = "index";
        if (!isset($_REQUEST['c'])) {
            $class      = "App\controllers\\" . ucwords($controller) . "Controller";
            $redirect   = new $class();
            $redirect->$action();
        } else {
            $controller = ucwords(strtolower($_REQUEST['c']));
            $action     = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
            $class      = "App\controllers\\" . $controller . "Controller";
            $redirect   = new $class();
            $redirect->$action();
        }
    }
}