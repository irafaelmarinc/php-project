<?php

namespace App\services;

use App\models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    function getProducts() {
        try {
            $response = Product::select('id', 'description', 'price', 'isActive')->where([
                ['isActive', 1]
            ])->get();
            return (count($response) > 0) ? json_decode(json_encode($response), true) : [];
        } catch (\Exception $ex) {
            echo json_encode(['status' => $ex->getCode(), 'message' => $ex->getMessage()]);
        }
    }

    function getProduct($id, $description) {
        try {
            $response = Product::select('id', 'description', 'price')
            ->where([
                ['id', $id],
                ['description', $description],
                ['isActive', 1]
            ])->get();
            return (count($response) > 0) ? json_decode(json_encode($response), true)[0] : [];
        } catch (\Exception $ex) {
            echo json_encode(['status' => $ex->getCode(), 'message' => $ex->getMessage()]);
        }
    }
}