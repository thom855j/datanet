<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Cmd\Host;

use App\Http\Controllers\Controller;
use App\Models\Hosts\Host;
use Respect\Validation\Validator as v;

class NewHostController extends Controller {

    private function redirectUrl($hostname) {

        echo json_encode([
            'redirect' => 1, 
            'redirect_url' => $this->router->pathFor('auth.host', ['hostname' => $hostname])
        ]);
    }

    public function get($req, $res, $args) {
       return $this->post($req, $res, $args);
       // return $this->view->render($res, 'auth/host/IBM-DOS.twig');
    }

    private function createHost($req) {

         $v = $this->validator->validate($req, [
                'hostname' => v::notEmpty()->hostnameExists(),
                'password' => v::noWhitespace()->notEmpty()
            ]);

            if ($v->failed()) {

                if( isset($_SESSION['errors']['hostname']) )  {
                    foreach ($_SESSION['errors']['hostname'] as $error) {
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

            $host_os = $req->getParam('os') ? $req->getParam('os') : 'UNIX';

            $host = Host::create([
                'host_ip' => randomIP(),
                'host_name' => $req->getParam('hostname'),
                'host_type' => $host_os
            ]);

            $host->setPassword($req->getParam('password'));

            $this->auth->hostAttempt($req->getParam('hostname'), $req->getParam('password'));

            return $this->redirectUrl($req->getParam('hostname'));
    }

    public function post($req, $res, $args) {

        if( count($_SESSION['input']) < 2) {

            echo json_encode(['feedback'=> 'Missing parameters. Use <b>NEWHOST</b> < hostname > < password > [os].']);
            return false;
        }

        if( count($_SESSION['input']) == 3 ) {

            return $this->createHost($req);

        } else {

            return $this->response->withStatus(500);
        }
    }

}
