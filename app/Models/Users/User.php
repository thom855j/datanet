<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    const CREATED_AT = 'user_registered';
    const UPDATED_AT = 'user_last';

    protected $table = 'users';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'user_login',
        'user_pass',
        'user_email',
        'user_ip',
        'user_activation_key',
        'user_status',
        'user_active',
        'user_cmd'
    ];

    public function setPassword($password) {
        return $this->update([
            'user_pass' => base64_encode($password),
        ]);
    }

    public function getFinger() {
       return User::where('user_active', '=', 1)
            ->select('user_login AS username', 'user_status AS status', 'user_last as last', 'user_ip as where')
            ->get()
            ->toArray();
    }

    public function getUsers($number = 0 , $max = 10) {

       return User::where('user_active', '=', 1)
            ->select('user_login AS username', 'user_status AS status', 'user_last as last', 'user_ip as where')
            ->skip($number)
            ->take($max)
            ->get()
            ->toArray();
    }
    


}
