<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Country extends Eloquent{

    protected $fillable = [
        'country_name',
        'country_language',
        'country_abbr'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}