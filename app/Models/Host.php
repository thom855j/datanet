<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Host extends Model {

    const CREATED_AT = 'user_date';
    const UPDATED_AT = 'user_modified';

    protected $table = 'hosts';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'host_root',
        'host_name',
        'host_password',
        'host_motd'
    ];

    public function setPassword($password) {
        return $this->update([
            'host_password' => base64_encode($password),
        ]);
    }


}
