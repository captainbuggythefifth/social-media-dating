<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent{

    const POST_STATUS_INACTIVE     = 0;
    const POST_STATUS_DEFAULT       = 1;
    const POST_STATUS_ADDED_BY_USER  = 2;
    const POST_STATUS_ADDED_BY_ADMIN  = 3;
    const POST_STATUS_DECLINED_BY_USER  = 4;
    const POST_STATUS_DECLINED_BY_ADMIN  = 5;
    const POST_STATUS_CANCELLED_BY_USER  = 6;
    const POST_STATUS_CANCELLED_BY_ADMIN  = 7;
    const POST_STATUS_ACCEPTED_BY_USER = 8;
    const POST_STATUS_ACCEPTED_BY_ADMIN = 9;
    const POST_STATUS_REMOVED_BY_USER = 10;
    const POST_STATUS_REMOVED_BY_ADMIN = 11;

    const POST_TYPE_TEXT = 1;
    const POST_TYPE_PHOTO = 2;
    const POST_TYPE_VIDEO = 3;
    const POST_TYPE_LINK = 4;

    const POST_TO_TYPE_USER = 1;
    const POST_TO_TYPE_HOME = 2;

    protected $fillable = [
        'user_id',
        'post_text',
        'photo_id',
        'from_user_id',
        'to_user_id',
        'post_type',
        'post_to_type',
        'video_id',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}