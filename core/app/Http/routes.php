<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
/*Route::get('/','PagesController@index');
get('songs', 'SongsController@index');
get('songs/edit/{slug}', 'SongsController@edit');
get('songs/{slug}', 'SongsController@show');

patch('songs/{slug}', 'SongsController@update');*/



/*resource('songs', 'SongsController', [
        'except' => [
            'create'
        ]
    ]
);*/

resource('songs', 'SongsController');
/*resource('users', 'UsersController', [
    'except' => ['store']
]);*/

/* Users visit other profiles */
get('/', 'PagesController@index');
get('/{user_name}', 'PagesController@control');
post('updates/get_details', 'PagesController@get_details');

/* Users */
get('user/', 'UsersController@index');
get('user/index', 'UsersController@index');
get('user/create', 'UsersController@create');
post('user/store', 'UsersController@store');
get('user/show/{user_name},', 'UsersController@show');
patch('user/update', 'UsersController@update');
post('user/login', 'UsersController@login');
get('user/profile', 'UsersController@profile');
get('user/settings', 'UsersController@settings');
post('user/update_profile_avatar', 'UsersController@update_profile_avatar');
get('/user/logout', 'UsersController@logout');
post('user/update_profile_name', 'UsersController@update_profile_name');
post('user/update_profile_email_address', 'UsersController@update_profile_email_address');
post('user/update_profile_password', 'UsersController@update_profile_password');
post('user/update_profile_birth_date', 'UsersController@update_profile_birth_date');
post('user/update_profile_country', 'UsersController@update_profile_country');
post('user/update_profile_gender', 'UsersController@update_profile_gender');

/* Characters */

get('character/', 'CharactersController@index');
get('character/create', 'CharactersController@create');
post('character/store', 'CharactersController@store');
get('character/show/{user_name},', 'CharactersController@show');
post('character/update', 'CharactersController@update');
post('character/login', 'CharactersController@login');
get('character/profile', 'CharactersController@profile');

post('character/change_character', 'CharactersController@change_character');
post('character/get_details', 'CharactersController@get_details');
post('character/update', 'CharactersController@update');
post('character/delete', 'CharactersController@delete');
post('character/update_status_archive', 'CharactersController@update_status_archive');
post('character/update_status_activate', 'CharactersController@update_status_activate');
/* Families */

post('family/get_by_specy', 'FamiliesController@get_by_specy');

/* User Settings */
post('user_settings/update', 'UserSettingsController@update');
post('user_settings/update_status', 'UserSettingsController@update_status');

/* Mates */
post('mate/create', 'MatesController@create');
post('mate/cancel', 'MatesController@cancel');
post('mate/accept', 'MatesController@accept');
post('mate/remove', 'MatesController@remove');

/* Comments */
post('comment/get_comments_by_photo_id', 'CommentsController@get_comments_by_photo_id');
post('comment/create', 'CommentsController@create');

/* Likes */
post('like/create', 'LikesController@create');

