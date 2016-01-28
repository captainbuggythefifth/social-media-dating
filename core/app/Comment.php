<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Comment extends Eloquent{

    const COMMENT_STATUS_INACTIVE     = 0;    //INACTIVE - MONTHS OF NON-ACTIVITY
    const COMMENT_STATUS_DEFAULT       = 1;    //ACTIVE
    const COMMENT_STATUS_ENABLED_BY_USER  = 2;    //USER CHOOSES TO DEACTIVATE
    const COMMENT_STATUS_ENABLED_BY_ADMIN  = 3;    //USER CHOOSES TO DELETE
    const COMMENT_STATUS_DISABLED_BY_USER  = 4;    //USER CHOOSES TO DEACTIVATE
    const COMMENT_STATUS_DISABLED_BY_ADMIN  = 5;    //USER CHOOSES TO DELETE
    const COMMENT_STATUS_DELETED_BY_USER = 6;
    const COMMENT_STATUS_DELETED_BY_ADMIN = 7;

    const COMMENT_FROM_TYPE_USER = 1;
    const COMMENT_FROM_TYPE_CHARACTER = 2;
    const COMMENT_FROM_TYPE_FAMILY = 3;
    const COMMENT_FROM_TYPE_SPECY = 4;
    const COMMENT_FROM_TYPE_PHOTO = 5;
    const COMMENT_FROM_TYPE_POST = 6;
    const COMMENT_FROM_TYPE_MATE = 7;

    const COMMENT_TYPE_TEXT = 1;
    const COMMENT_TYPE_PHOTO = 2;
    const COMMENT_TYPE_VIDEO = 3;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'comment_text',
        'comment_type',
        'status',
        'comment_from_type',
        'photo_id',
        'character_id',
        'family_id',
        'specy_id',
        'post_id',
        'mate_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}