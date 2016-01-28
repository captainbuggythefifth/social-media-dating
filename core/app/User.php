<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent{

    const USER_STATUS_INACTIVE     = 0;    //INACTIVE - MONTHS OF NON-ACTIVITY
    const USER_STATUS_ACTIVE       = 1;    //ACTIVE
    const USER_STATUS_DEACTIVATED_BY_USER  = 2;    //USER CHOOSES TO DEACTIVATE
    const USER_STATUS_DEACTIVATED_BY_ADMIN = 3;    //USER CHOOSES TO DELETE
    const USER_STATUS_DELETED_BY_USER = 4;
    const USER_STATUS_DELETED_BY_ADMIN = 5;

    const USER_GENDER_MALE = 1;
    const USER_GENDER_FEMALE = 2;
    const USER_GENDER_IN_BETWEEN = 3;
    const USER_GENDER_CURRENTLY_CONFUSED = 4;

    protected $fillable = [
        'user_name',
        'email_address',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'character_type',
        'country',
        'gender',
        'birth_date',
        'current_character_id',
        'current_character_avatar',
        'current_character_avatar_mini',
        'photo_id'
    ];

    protected $hidden = [
        'password',
        'created_at',
        'updated_at'
    ];
}