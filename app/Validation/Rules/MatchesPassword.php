<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Validation\Rules;

use App\Models\User;
use Respect\Validation\Rules\AbstractRule;

class MatchesPassword extends AbstractRule {

    protected $pass;

    public function __construct($password) {
        $this->pass = $password;
    }

    public function validate($input) {
        return password_verify($input, $this->pass);
    }

}
