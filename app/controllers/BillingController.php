<?php

namespace App\controllers;

use App\services\UserService;

class BillingController
{
    function index() {
        $usr_srv = new UserService();
        $users = $usr_srv->getUsers();

        require_once "app/resources/views/layouts/template.php";
        require_once "app/resources/views/billing/index.php";
    }
}