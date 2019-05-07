<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    const CREATED_AT = 'user_registered';
    const UPDATED_AT = false;

    protected $table = 'users';
    protected $fillable = [
        'user_email',
        'user_login',
        'user_pass',
    ];

    public function setPassword($password) {
        return $this->update([
                    'user_pass' => password_hash($password, PASSWORD_DEFAULT),
        ]);
    }

    public function getUpdatedAtColumn() {
        return null;
    }

}
