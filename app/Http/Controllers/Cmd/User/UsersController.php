<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\User;

use App\Http\Controllers\Controller;
use App\Models\Users\User;

class UsersController extends Controller {

    public function get($req, $res, $args) {
         return $this->post($req, $res, $args);
    }

    public function post($req, $res, $args) {

        if( count($_SESSION['input']) === 1) {

            $data = User::getUsers();

            echo json_encode(['feedback'=> multiTable($data)]);

          
        }

    }

}
