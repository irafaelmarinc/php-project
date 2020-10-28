<?php

namespace App\services;

use App\models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    function getUsers() {
        try {
            $response = User::select('ci', 'first_name', 'last_name', 'phone')->get();
            return (count($response) > 0) ? json_decode(json_encode($response), true) : [];
        } catch (\Exception $ex) {
            echo json_encode(['status' => $ex->getCode(), 'message' => $ex->getMessage()]);
        }
    }

    function addUser($params) {
        try {
            $user = new User();
            $user->ci          = $params['ci'];
            $user->first_name  = $params['first_name'];
            $user->last_name   = $params['last_name'];
            $user->phone       = $params['phone'];
            $user->date        = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
            return $user;
        } catch (\Exception $ex) {
            echo json_encode(['status' => $ex->getCode(), 'message' => $ex->getMessage()]);
        }  
    }

    function setUser($conditions, $upgrades) {
        DB::beginTransaction();
        try {
            $response = User::where($conditions)->update($upgrades);
            DB::commit();
            return $response;
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status' => 0, 'message' => $ex->getMessage()]);
        }
    }
}