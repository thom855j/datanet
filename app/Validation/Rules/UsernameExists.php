<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Validation\Rules;

use App\Models\Users\User;
use Respect\Validation\Rules\AbstractRule;

class UsernameExists extends AbstractRule {

    public function validate($input) {
        return User::where('user_login', $input)->count() === 0;
    }

}
