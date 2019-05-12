<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Command extends Model {

    public $timestamps = false;

    protected $table = 'commands';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'cmd_name',
        'cmd_args',
        'cmd_alias',
        'cmd_desc'
    ];

    public function getCommands($auth = false) {
       
        if($auth) {
        return  Command::where('cmd_auth',1)
            ->select('cmd_name AS CMD', 'cmd_args as ARGS', 'cmd_alias as ALIAS', 'cmd_desc AS DESC')
            ->get()->toArray();
        }

        return  Command::where('cmd_auth',0)
            ->select('cmd_name AS CMD', 'cmd_args as ARGS', 'cmd_alias as ALIAS', 'cmd_desc AS DESC')
            ->get()->toArray();


    }

}
