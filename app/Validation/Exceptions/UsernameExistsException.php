<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class UsernameExistsException extends ValidationException {

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Username is already taken.',
        ]
    ];

    public function validate($input) {
        return false;
    }

}
