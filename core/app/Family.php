<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Family extends Eloquent{

    const FAMILY_STATUS_INACTIVE     = 0;    //INACTIVE - MONTHS OF NON-ACTIVITY
    const FAMILY_STATUS_DEFAULT       = 1;    //ACTIVE
    const FAMILY_STATUS_ENABLED_BY_USER  = 2;    //USER CHOOSES TO DEACTIVATE
    const FAMILY_STATUS_ENABLED_BY_ADMIN  = 3;    //USER CHOOSES TO DELETE
    const FAMILY_STATUS_DISABLED_BY_USER  = 4;    //USER CHOOSES TO DEACTIVATE
    const FAMILY_STATUS_DISABLED_BY_ADMIN  = 5;    //USER CHOOSES TO DELETE
    const FAMILY_STATUS_DELETED_BY_USER = 6;
    const FAMILY_STATUS_DELETED_BY_ADMIN = 7;

    protected $fillable = [
        'photo_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}