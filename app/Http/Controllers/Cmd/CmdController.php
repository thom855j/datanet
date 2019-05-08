<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Respect\Validation\Validator as v;

class CmdController extends Controller {

    public function index($req, $res, $args) {
        return $this->view->render($res, 'lobby.twig');
    }

    public function getNewuser($req, $res, $args) {

        return $this->view->render($res, 'cmd/newuser/index.twig');
    }

    public function postNewuser($req, $res, $args) {

        $cmd = explode(' ', $req->getParam('input'));

        if( count($cmd) != 3 ) {
            echo 'Missing parameters. Have to be "newuser < username|password >".';
            return false;
        }

        $v = $this->validator->validate($req, [
            'username' => v::notEmpty()->usernameExists(),
            'password' => v::noWhitespace()->notEmpty(),
        ]);

        if ($v->failed()) {

            if( isset($_SESSION['errors']['username']) )  {
                foreach ($_SESSION['errors']['username'] as $error) {
                    echo $error;
                }
            }

            if( isset($_SESSION['errors']['password']) )  {
                foreach ($_SESSION['errors']['password'] as $error) {
                    echo $error;
                }
            }
            return false;
        }


        $user = User::create([
            'user_login' => $req->getParam('username'),
        ]);

        $user->setPassword($req->getParam('password'));

        echo 'New user created.';


    }

}
