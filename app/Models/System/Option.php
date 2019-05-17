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

    public function getAutoloadOptions() {

       return Option::where('autoload', 'yes')->get();
       
    }

    public function getOptions($number = 0 , $max = 10) {

       return Option::skip($number)
            ->take($max)
            ->get()
            ->toArray();
    }

    public function getOption($name) {
        return Option::where('option_name', $name)->first();
    }

}
