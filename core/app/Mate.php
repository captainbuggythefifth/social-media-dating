<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Mate extends Eloquent{

    const MATE_STATUS_INACTIVE     = 0;
    const MATE_STATUS_DEFAULT       = 1;
    const MATE_STATUS_ADDED_BY_USER  = 2;
    const MATE_STATUS_ADDED_BY_ADMIN  = 3;
    const MATE_STATUS_DECLINED_BY_USER  = 4;
    const MATE_STATUS_DECLINED_BY_ADMIN  = 5;
    const MATE_STATUS_CANCELLED_BY_USER  = 6;
    const MATE_STATUS_CANCELLED_BY_ADMIN  = 7;
    const MATE_STATUS_ACCEPTED_BY_USER = 8;
    const MATE_STATUS_ACCEPTED_BY_ADMIN = 9;
    const MATE_STATUS_REMOVED_BY_USER = 10;
    const MATE_STATUS_REMOVED_BY_ADMIN = 11;
    
    protected $fillable = [
        'from_user_id', 
        'to_user_id',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}