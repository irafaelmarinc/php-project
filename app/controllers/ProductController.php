<?php

namespace App\controllers;

use App\services\UserService;
use App\services\ProductService;

class ProductController
{
    function index() {
        $usr_srv = new UserService();
        $pro_srv = new ProductService();

        $users = $usr_srv->getUsers();
        $products = $pro_srv->getProducts();

        require_once "app/resources/views/layouts/template.php";
        require_once "app/resources/views/billing/index.php";
    }

    function getProductSelected() {
        $prod_srv = new ProductService();
        if (isset($_REQUEST["id"]) && isset($_REQUEST["description"])) {
            echo json_encode($prod_srv->getProduct($_REQUEST["id"], $_REQUEST["description"]));
        }
    }
}