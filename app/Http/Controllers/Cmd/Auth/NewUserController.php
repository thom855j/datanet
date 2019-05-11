<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users\User;
use Respect\Validation\Validator as v;

class NewUserController extends Controller {

    private function redirectUrl($username) {

        echo json_encode([
            'redirect' => 1, 
            'redirect_url' => $this->router->pathFor('auth.user', ['username' => $username])
        ]);
    }

    private function createUser($req) {

         $v = $this->validator->validate($req, [
                'username' => v::notEmpty()->usernameExists(),
                'password' => v::noWhitespace()->notEmpty()
            ]);

            if ($v->failed()) {

                if( isset($_SESSION['errors']['username']) )  {
                    foreach ($_SESSION['errors']['username'] as $error) {
                         $errors .= $error;
                    }
                    echo json_encode(['feedback'=> $errors]);
                }

                if( isset($_SESSION['errors']['password']) )  {
                    foreach ($_SESSION['errors']['password'] as $error) {
                         $errors .= $error;
                    }
                    echo json_encode(['feedback'=> $errors]);
                }
                return false;
            }


            $user = User::create([
                'user_login' => $req->getParam('username'),
                'user_active' => 1,
                'user_ip' => getUserLocation()
            ]);

            $user->setPassword($req->getParam('password'));

            $this->auth->attempt($req->getParam('username'), $req->getParam('password'));

            return $this->redirectUrl($req->getParam('username'));
    }


    private function createUserWithEmail($req) {

            $v = $this->validator->validate($req, [
                'username' => v::notEmpty()->usernameExists(),
                'password' => v::noWhitespace()->notEmpty(),
                'email' => v::noWhitespace()->notEmpty()->email()->emailExists()
            ]);

            if ($v->failed()) {

                if( isset($_SESSION['errors']['username']) )  {
                    foreach ($_SESSION['errors']['username'] as $error) {
                         $errors .= $error;
                    }
                    echo json_encode(['feedback'=> $errors]);
                }

                if( isset($_SESSION['errors']['password']) )  {
                    foreach ($_SESSION['errors']['password'] as $error) {
                          $errors .= $error;
                    }
                    echo json_encode(['feedback'=> $errors]);
                }

                 if( isset($_SESSION['errors']['email']) )  {
                    foreach ($_SESSION['errors']['email'] as $error) {
                          $errors .= $error;
                    }
                    echo json_encode(['feedback'=> $errors]);
                }
                return false;
            }


            $user = User::create([
                'user_login' => $req->getParam('username'),
                'user_email' => $req->getParam('email'),
                'user_active' => 1,
                'user_ip' => getIP()
            ]);

            $user->setPassword($req->getParam('password'));

            $this->auth->attempt($req->getParam('username'), $req->getParam('password'));

            return $this->redirectUrl($req->getParam('username'));
           
    }

    public function get($req, $res, $args) {

       return $this->post($req, $res, $args);

    }

    public function post($req, $res, $args) {

        if( count($_SESSION['input']) < 2) {

            echo json_encode(['feedback'=> 'Missing parameters. Have to be <b>NEWUSER</b> < username > < password > [ email ].']);
            return false;
        }

        if( count($cmd) == 3 ) {

            return $this->createUser($req);

        } if (count($cmd) == 4) {

            return $this->createUserWithEmail($req);
         
        } else {
            return $this->response->withStatus(500);
        }
        


    }

}
