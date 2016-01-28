<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Specy extends Eloquent{

    const SPECY_STATUS_INACTIVE     = 0;    //INACTIVE - MONTHS OF NON-ACTIVITY
    const SPECY_STATUS_DEFAULT       = 1;    //ACTIVE
    const SPECY_STATUS_ENABLED_BY_USER  = 2;    //USER CHOOSES TO DEACTIVATE
    const SPECY_STATUS_ENABLED_BY_ADMIN  = 3;    //USER CHOOSES TO DELETE
    const SPECY_STATUS_DISABLED_BY_USER  = 4;    //USER CHOOSES TO DEACTIVATE
    const SPECY_STATUS_DISABLED_BY_ADMIN  = 5;    //USER CHOOSES TO DELETE
    const SPECY_STATUS_DELETED_BY_USER = 6;
    const SPECY_STATUS_DELETED_BY_ADMIN = 7;

    protected $fillable = [
        'photo_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}