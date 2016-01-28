<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Notification extends Eloquent{

    //SAVE 1-20 for MATE
    const NOTIFICATION_TYPE_MATE_ADD_REQUEST_BY_USER = 1;
    const NOTIFICATION_TYPE_MATE_DECLINED_REQUEST_BY_USER = 2;
    const NOTIFICATION_TYPE_MATE_ACCEPTED_REQUEST_BY_USER = 3;
    const NOTIFICATION_TYPE_MATE_ADD_REQUEST_BY_ADMIN = 4;
    const NOTIFICATION_TYPE_MATE_DECLINED_REQUEST_BY_ADMIN = 5;
    const NOTIFICATION_TYPE_MATE_ACCEPTED_REQUEST_BY_ADMIN = 6;

    const NOTIFICATION_TYPE_USER = 11;
    const NOTIFICATION_TYPE_CHARACTER = 12;
    const NOTIFICATION_TYPE_FAMILY = 13;
    const NOTIFICATION_TYPE_SPECY = 14;
    const NOTIFICATION_TYPE_PHOTO = 15;
    const NOTIFICATION_TYPE_POST = 16;
    const NOTIFICATION_TYPE_MATE = 17;
    const NOTIFICATION_TYPE_COMMENT = 18;


    const NOTIFICATION_STATUS_INACTIVE     = 0;    //INACTIVE - MONTHS OF NON-ACTIVITY
    const NOTIFICATION_STATUS_ACTIVE       = 1;    //ACTIVE
    const NOTIFICATION_STATUS_DEACTIVATED_BY_USER  = 2;    //USER CHOOSES TO DEACTIVATE
    const NOTIFICATION_STATUS_DEACTIVATED_BY_ADMIN = 3;    //USER CHOOSES TO DELETE
    const NOTIFICATION_STATUS_DELETED_BY_USER = 4;
    const NOTIFICATION_STATUS_DELETED_BY_ADMIN = 5;

    const NOTIFICATION_STATUS_SEEN_BY_USER = 6;
    const NOTIFICATION_STATUS_READ_BY_USER = 7;


    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'notification_type',
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