<?php

namespace App\controllers;

class BillingController
{
    function index() {
        require_once "app/resources/views/layouts/template.php";
        require_once "app/resources/views/billing/index.php";
    }
}