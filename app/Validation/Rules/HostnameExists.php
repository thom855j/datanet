<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Validation\Rules;

use App\Models\Hosts\Host;
use Respect\Validation\Rules\AbstractRule;

class UsernameExists extends AbstractRule {

    public function validate($input) {
        return Host::where('host_name', $input)->count() === 0;
    }

}
