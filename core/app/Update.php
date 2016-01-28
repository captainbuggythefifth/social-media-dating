<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Update extends Eloquent{

    const UPDATE_TYPE_USER = 1;
    const UPDATE_TYPE_SPECY = 2;
    const UPDATE_TYPE_FAMILY = 3;
    const UPDATE_TYPE_CHARACTER = 4;
    const UPDATE_TYPE_MATE = 5;
    const UPDATE_TYPE_COMMENT = 6;
    const UPDATE_TYPE_PHOTO = 7;
    const UPDATE_TYPE_LIKE = 8;
    const UPDATE_TYPE_POST = 9;

    const UPDATE_STATUS_INACTIVE     = 0;    //INACTIVE - MONTHS OF NON-ACTIVITY
    const UPDATE_STATUS_ACTIVE       = 1;    //ACTIVE
    const UPDATE_STATUS_DEACTIVATED_BY_USER  = 2;    //USER CHOOSES TO DEACTIVATE
    const UPDATE_STATUS_DEACTIVATED_BY_ADMIN = 3;    //USER CHOOSES TO DELETE
    const UPDATE_STATUS_DELETED_BY_USER = 4;
    const UPDATE_STATUS_DELETED_BY_ADMIN = 5;
    const UPDATE_STATUS_ACTIVATED_BY_USER = 6;
    const UPDATE_STATUS_ACTIVATED_BY_ADMIN = 7;


    protected $fillable = [
        'user_id',
        'update_type',
        'character_id',
        'comment_id',
        'like_id',
        'post_id',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}