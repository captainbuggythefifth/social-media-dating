<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserSetting extends Eloquent{
    const PROFILE_SETTINGS_PUBLIC = 1;
    const PROFILE_SETTINGS_PRIVATE = 2;
    const PROFILE_SETTINGS_MY_MATES = 3;

    const CHAT_SETTINGS_PUBLIC = 11;
    const CHAT_SETTINGS_PRIVATE = 12;
    const CHAT_SETTINGS_MY_MATES = 13;

    const CHARACTER_SETTINGS_PUBLIC = 21;
    const CHARACTER_SETTINGS_PRIVATE = 22;
    const CHARACTER_SETTINGS_MY_MATES = 23;

    const PROFILE_STATUS_DEFAULT = 101;
    const PROFILE_STATUS_ENABLED_BY_USER = 102;
    const PROFILE_STATUS_ENABLED_BY_ADMIN = 103;
    const PROFILE_STATUS_DISABLED_BY_USER = 104;
    const PROFILE_STATUS_DISABLED_BY_ADMIN = 105;

    const CHAT_STATUS_DEFAULT = 111;
    const CHAT_STATUS_ENABLED_BY_USER = 112;
    const CHAT_STATUS_ENABLED_BY_ADMIN = 113;
    const CHAT_STATUS_DISABLED_BY_USER = 114;
    const CHAT_STATUS_DISABLED_BY_ADMIN = 115;

    const CHARACTER_STATUS_DEFAULT = 121;
    const CHARACTER_STATUS_ENABLED_BY_USER = 122;
    const CHARACTER_STATUS_ENABLED_BY_ADMIN = 123;
    const CHARACTER_STATUS_DISABLED_BY_USER = 124;
    const CHARACTER_STATUS_DISABLED_BY_ADMIN = 125;

    protected $fillable = [
        'user_id',
        'user_chat',
        'user_profile',
        'user_character',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}