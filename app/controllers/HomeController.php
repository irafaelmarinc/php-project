<?php

namespace App\controllers;

use App\services\UserService;

class HomeController extends Controller
{
    function __construct() {}

    function index() {
        $usr_srv = new UserService();
        $users = $usr_srv->getUsers();

        require_once "app/resources/views/layouts/template.php";
        require_once "app/resources/views/home.php";
    }

    function CreateOrEdit() {

        $usr_srv = new UserService();

        $params = $_REQUEST;
        if (isset($params["dni"])) {
            $conditions = [
                ["ci", $params["dni"]],
                ["isActive", 1],
            ];
            $upgrades = [
                "first_name" => $params["first_name"],
                "last_name" => $params["last_name"],
                "phone" => $params["phone"]
            ];

            $usr_srv->setUser($conditions, $upgrades);
        } else {
            $user = $usr_srv->addUser($params);
        }

        header("Location: index.php");
    }

    function edit() {
        if (isset($_REQUEST['dni'])) {

            $usr_srv = new UserService();
            $user = $usr_srv->getUser($_REQUEST['dni']);

            require_once "app/resources/views/layouts/template.php";
            require_once "app/resources/views/edit.php";
        }
    }

    function delete() {
        $usr_srv = new UserService();

        $params = $_REQUEST;
        if (isset($params["dni"])) {
            $conditions = [
                ["ci", $params["dni"]],
                ["isActive", 1],
            ];
            $upgrades = [
                "isActive" => 0,
            ];

            $usr_srv->setUser($conditions, $upgrades);
        }
        header("Location: index.php");
    }
}