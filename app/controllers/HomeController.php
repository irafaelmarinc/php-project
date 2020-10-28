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

    function create() {
        echo "Create";
    }

    function edit() {
        echo "Edit";
    }

    function delete() {
        echo "Delete";
    }
}