<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Option extends Model {

    public $timestamps = false;

    protected $table = 'options';

    protected $primaryKey = 'option_id';

    protected $fillable = [
        'option_name',
        'option_value',
        'autoload'
    ];

    public function getUsers($number = 0 , $max = 10) {

       $os = Option::where('option_name', 'operating_systems')->first();

       return unserialize($os);
    }

    public function getOptions($number = 0 , $max = 10) {

       return Option::where('user_active', '=', 1)
            ->select('user_login AS username', 'user_status AS status', 'user_last as last', 'user_ip as where')
            ->skip($number)
            ->take($max)
            ->get()
            ->toArray();
    }

}
