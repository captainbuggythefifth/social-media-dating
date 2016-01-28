<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Character extends Eloquent{

    const CHARACTER_STATUS_INACTIVE     = 0;    //INACTIVE - MONTHS OF NON-ACTIVITY
    const CHARACTER_STATUS_DEFAULT       = 1;    //ACTIVE
    const CHARACTER_STATUS_ENABLED_BY_USER  = 2;    //USER CHOOSES TO DEACTIVATE
    const CHARACTER_STATUS_ENABLED_BY_ADMIN  = 3;    //USER CHOOSES TO DELETE
    const CHARACTER_STATUS_DISABLED_BY_USER  = 4;    //USER CHOOSES TO DEACTIVATE
    const CHARACTER_STATUS_DISABLED_BY_ADMIN  = 5;    //USER CHOOSES TO DELETE
    const CHARACTER_STATUS_DELETED_BY_USER = 6;
    const CHARACTER_STATUS_DELETED_BY_ADMIN = 7;

    protected $fillable = [
        'user_id',
        'families_id',
        'character_name',
        'character_age',
        'character_avatar',
        'character_description',
        'character_avatar_mini',
        'photo_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}