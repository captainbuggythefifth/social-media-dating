<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Like extends Eloquent{


    const LIKE_TYPE_USER = 1;
    const LIKE_TYPE_CHARACTER = 2;
    const LIKE_TYPE_FAMILY = 3;
    const LIKE_TYPE_SPECY = 4;
    const LIKE_TYPE_PHOTO = 5;
    const LIKE_TYPE_POST = 6;
    const LIKE_TYPE_MATE = 7;
    const LIKE_TYPE_COMMENT = 8;


    const LIKE_STATUS_INACTIVE     = 0;    //INACTIVE - MONTHS OF NON-ACTIVITY
    const LIKE_STATUS_ACTIVE       = 1;    //ACTIVE OR LIKED BY DEFAULT WHEN CREATED
    const LIKE_STATUS_DEACTIVATED_BY_USER  = 2;    //USER CHOOSES TO DEACTIVATE
    const LIKE_STATUS_DEACTIVATED_BY_ADMIN = 3;    //USER CHOOSES TO DELETE
    const LIKE_STATUS_DELETED_BY_USER = 4;
    const LIKE_STATUS_DELETED_BY_ADMIN = 5;
    const LIKE_STATUS_DISLIKED_BY_USER = 6;
    const LIKE_STATUS_DISLIKED_BY_ADMIN = 7;


    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'like_type',
        'photo_id',
        'character_id',
        'family_id',
        'specy_id',
        'post_id',
        'mate_id',
        'user_id',
        'comment_id',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}