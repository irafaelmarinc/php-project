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

    function ResponseSuccessfully($payload, $http_code = 200) {
        header("Content-type: application/json");
        http_response_code($http_code);
        $response = array("status" => 1, "data" => (empty($payload)) ? [] : $payload);
        echo json_encode($response);
    }
}