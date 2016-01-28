<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Photo extends Eloquent{

    const PHOTO_STATUS_INACTIVE     = 0;    //INACTIVE - MONTHS OF NON-ACTIVITY
    const PHOTO_STATUS_DEFAULT       = 1;    //ACTIVE
    const PHOTO_STATUS_ENABLED_BY_USER  = 2;    //USER CHOOSES TO DEACTIVATE
    const PHOTO_STATUS_ENABLED_BY_ADMIN  = 3;    //USER CHOOSES TO DELETE
    const PHOTO_STATUS_DISABLED_BY_USER  = 4;    //USER CHOOSES TO DEACTIVATE
    const PHOTO_STATUS_DISABLED_BY_ADMIN  = 5;    //USER CHOOSES TO DELETE
    const PHOTO_STATUS_DELETED_BY_USER = 6;
    const PHOTO_STATUS_DELETED_BY_ADMIN = 7;

    const PHOTO_TYPE_USER = 1;
    const PHOTO_TYPE_CHARACTER = 2;
    const PHOTO_TYPE_FAMILY = 3;
    const PHOTO_TYPE_SPECY = 4;
    const PHOTO_TYPE_COMMENT = 5;
    const PHOTO_TYPE_POST = 6;


    const PHOTO_LINK_AVATAR_CHARACTER_NORMAL = 'images/avatars/characters/normal/';
    const PHOTO_LINK_AVATAR_CHARACTER_MINI = 'images/avatars/characters/mini/';
    const PHOTO_LINK_AVATAR_CHARACTER_NORMAL_DEFAULT = 'images/avatars/characters/normal/default.jpg';
    const PHOTO_LINK_AVATAR_CHARACTER_MINI_DEFAULT = 'images/avatars/characters/mini/default.jpg';
    const PHOTO_LINK_AVATAR_USER = 'images/avatars/users/';
    const PHOTO_LINK_AVATAR_USER_DEFAULT = 'images/avatars/users/default.jpg';

    const PHOTO_LINK_COMMENT = "images/comments/";
    const PHOTO_LINK_POST = "images/posts/";

    protected $fillable = [
        'user_id',
        'families_id',
        'photo_name',
        'photo_description',
        'photo_link',
        'photo_type',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}