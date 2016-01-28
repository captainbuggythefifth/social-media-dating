<?php

namespace App\Http\Controllers;

use App\Character;
use App\Family;
use App\Like;
use App\Mate;
use App\Photo;
use App\Post;
use App\Specy;
use App\Update;
use App\User;
use App\UserSetting;
use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class PagesController extends Controller
{

    public function index(){

        $iLimit = 10;
        $iOffset = 0;
        if(Input::get('iOffset')){
            $iOffset = Input::get('iOffset');
        }

        $htmlView = "";

        $bLoggedInUser = Session::has('user');
        if($bLoggedInUser){

            $aLoggedInUser['user'] = User::where('id', Session::get('user')['id'])->first()->toArray();
            $aLoggedInUser['current_character'] = Character::where('id', $aLoggedInUser['user']['current_character_id'])->first()->toArray();
        }


        return view('users.pages.show')
                ->with('aLoggedInUser', $aLoggedInUser)
                ->with('htmlView', $htmlView);


    }

    public function control($sUserName){
        switch($sUserName){
            case 'logout':
                return redirect('user/logout');
            case 'characters':
                return redirect('character/index');
            case 'users':
                return redirect('user/index');
            default:
                $oUser = User::where('user_name', $sUserName)->first();
                if($oUser == null){
                    dd("ALALALHJ!");
                }
                else{

                    $aLoggedInUser = null;
                    $bOwner = false;
                    $oMate = null;
                    $bLoggedInUser = Session::has('user');
                    if($bLoggedInUser){
                        if($oUser->toArray()['id'] == Session::get('user')['id']){
                            $bOwner = true;
                        }
                        $aLoggedInUser['user'] = User::where('id', Session::get('user')['id'])->first()->toArray();
                        $aLoggedInUser['current_character'] = Character::where('id', $aLoggedInUser['user']['current_character_id'])->first()->toArray();
                    }


                    $aUser['user'] = $oUser->toArray();
                    $aUser['current_character'] = Character::where('id', $aUser['user']['current_character_id'])->first()->toArray();
                    $aUser['active_characters'] = Character::where('user_id', $aUser['user']['id'])->where('status', Character::CHARACTER_STATUS_DEFAULT)->orWhere('status', Character::CHARACTER_STATUS_ENABLED_BY_USER)->orWhere('status', Character::CHARACTER_STATUS_ENABLED_BY_ADMIN)->get()->toArray();
                    $aUser['inactive_characters'] = Character::where('user_id', $aUser['user']['id'])->where('status', Character::CHARACTER_STATUS_DISABLED_BY_USER)->orWhere('status', Character::CHARACTER_STATUS_INACTIVE)->get()->toArray();
                    $aUser['user_settings'] = UserSetting::where('user_id', $oUser->toArray()['id'])->first()->toArray();
                    $aUser['current_photo'] = Photo::where('id', $aUser['user']['photo_id'])->first()->toArray();

                    //Mates

                    $bRequestedFromLoggedInUser = false;

                    if($bLoggedInUser){
                        $sSql = 'SELECT * from mates where ((from_user_id = ' . $aUser['user']['id'] . ' AND to_user_id = ' . Session::get('user')['id'] . ') OR (from_user_id = ' . Session::get('user')['id'] . ' AND to_user_id = ' . $aUser['user']['id'] . ')) AND (status = ' . Mate::MATE_STATUS_ADDED_BY_USER . ' OR status <> ' . Mate::MATE_STATUS_ADDED_BY_ADMIN . ')';
                        $oMate = DB::select($sSql);

                        $oMate = Mate::where('from_user_id', $aUser['user']['id'])
                            ->orWhere('to_user_id', Session::get('user')['id'])
                            ->orWhere(function($query){
                                $query->where('status', Mate::MATE_STATUS_ADDED_BY_ADMIN)
                                        ->where('status', Mate::MATE_STATUS_ADDED_BY_ADMIN);
                            })->orderBy('id', 'desc')->first();
                    }

                    $aUser['mate'] = is_null($oMate) || empty($oMate) ? NULL : $oMate->toArray();

                    if($aUser['mate']['from_user_id'] == Session::get('user')['id']){
                        $bRequestedFromLoggedInUser = true;
                    }

                    //End of mate

                    //Likes
                    $oUserUserLikers = Like::where('to_user_id', $aUser['user']['id'])->where('like_type', Like::LIKE_TYPE_USER)->where('user_id', $aUser['user']['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                    $aUser['user']['likers'] = $oUserUserLikers ? $oUserUserLikers->toArray() : [];
                    $aUser['user']['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aUser['user']['likers'], $aLoggedInUser['user']['id']);


                    $oCurrentCharacterLikers = Like::where('to_user_id', $aUser['user']['id'])->where('like_type', Like::LIKE_TYPE_CHARACTER)->where('character_id', $aUser['user']['current_character_id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                    $aUser['current_character']['likers'] = $oCurrentCharacterLikers ? $oCurrentCharacterLikers->toArray() : [];
                    $aUser['current_character']['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aUser['current_character']['likers'], $aLoggedInUser['user']['id']);
                    for($i = 0; $i <  count($aUser['active_characters']); $i++){
                        $aActiveCharacterLikers = Like::where('to_user_id', $aUser['user']['id'])->where('like_type', Like::LIKE_TYPE_CHARACTER)->where('character_id', $aUser['active_characters'][$i]['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                        $aUser['active_characters'][$i]['likers'] = $aActiveCharacterLikers ? $aActiveCharacterLikers->toArray() : [];
                        $aUser['active_characters'][$i]['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aUser['active_characters'][$i]['likers'], $aLoggedInUser['user']['id']);
                    }

                    for($i = 0; $i <  count($aUser['inactive_characters']); $i++){
                        $aInActiveCharacterLikers = Like::where('to_user_id', $aUser['user']['id'])->where('like_type', Like::LIKE_TYPE_CHARACTER)->where('character_id', $aUser['inactive_characters'][$i]['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                        $aUser['inactive_characters'][$i]['likers'] = $aInActiveCharacterLikers ? $aInActiveCharacterLikers->toArray() : [];
                        $aUser['inactive_characters'][$i]['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aUser['inactive_characters'][$i]['likers'], $aLoggedInUser['user']['id']);
                    }

                    $oCurrentPhotoLikers = Like::where('to_user_id', $aUser['user']['id'])->where('like_type', Like::LIKE_TYPE_PHOTO)->where('photo_id', $aUser['current_photo']['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                    $aUser['current_photo']['likers'] = $oCurrentPhotoLikers ? $oCurrentPhotoLikers->toArray() : [];
                    $aUser['current_photo']['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aUser['current_photo']['likers'], $aLoggedInUser['user']['id']);

                    //dd($aUser);

                    $aFamilies = Family::where('status', Family::FAMILY_STATUS_DEFAULT)->get()->toArray();
                    $aSpecies = Specy::where('status', Specy::SPECY_STATUS_DEFAULT)->get()->toArray();

                    return view('users.users.profile')
                        ->with('aLoggedInUser', is_array($aLoggedInUser) ? $aLoggedInUser : null)
                        ->with('aUser', $aUser)
                        ->with('bOwner', $bOwner)
                        ->with('bRequestedFromLoggedInUser', $bRequestedFromLoggedInUser)
                        ->with('bLoggedInUser', $bLoggedInUser)
                        ->with('aSpecies', $aSpecies)
                        ->with('aFamilies', $aFamilies);

                }
        }
    }

    public function get_details(){

        $iLimit = 10;
        $iOffset = 0;
        if(Input::get('iOffset')){
            $iOffset = Input::get('iOffset');
        }

        $htmlView = "";

        $bLoggedInUser = Session::has('user');
        if($bLoggedInUser){

            $aLoggedInUser['user'] = User::where('id', Session::get('user')['id'])->first()->toArray();
            $aLoggedInUser['current_character'] = Character::where('id', $aLoggedInUser['user']['current_character_id'])->first()->toArray();
        }

        //$aMate = Mate::query("SELECT * FROM mates WHERE ((from_user_id = 10 OR to_user_id = 10) AND (status = 8 OR status = 9))")->get()->toArray();
        $aMates = DB::select(DB::raw("SELECT * FROM mates WHERE ((from_user_id = " . $aLoggedInUser['user']['id'] . " OR to_user_id = " . $aLoggedInUser['user']['id'] .") AND (status = " . Mate::MATE_STATUS_ACCEPTED_BY_ADMIN ." OR status = " . Mate::MATE_STATUS_ACCEPTED_BY_USER . "))"));

        $aUserID = [];
        $sUserIDS = "";
        foreach(json_decode(json_encode($aMates), true) as $aMate){
            if($aMate['from_user_id'] != $aLoggedInUser['user']['id']){
                $aUserID[] = $aMate['from_user_id'];
                $sUserIDS = $sUserIDS . $aMate['from_user_id'] . ", ";
            }
            else{
                $aUserID[] = $aMate['to_user_id'];
                $sUserIDS = $sUserIDS . $aMate['to_user_id'] . ", ";
            }
        }
        $sUserIDS = (substr($sUserIDS, 0, -2));


        /* $aData = DB::select(DB::raw("SELECT characters.*, comments.*, likes.*, mates.*, posts.*, users.* FROM users
                                     LEFT JOIN characters on users.id = characters.user_id
                                     LEFT JOIN comments on (characters.user_id = comments.from_user_id OR characters.user_id = comments.to_user_id)
                                     LEFT JOIN likes on (comments.from_user_id = likes.from_user_id OR comments.from_user_id = likes.to_user_id OR comments.to_user_id = likes.from_user_id OR comments.to_user_id = likes.to_user_id)
                                     LEFT JOIN mates on (likes.from_user_id = mates.from_user_id OR likes.from_user_id = mates.to_user_id OR likes.to_user_id = mates.from_user_id OR likes.to_user_id = mates.to_user_id)
                                     LEFT JOIN posts on (likes.from_user_id = posts.from_user_id OR likes.from_user_id = posts.to_user_id OR likes.to_user_id = posts.from_user_id OR likes.to_user_id = posts.to_user_id OR likes.from_user_id = posts.user_id OR likes.to_user_id = posts.user_id)
                                     WHERE users.id = " . $aLoggedInUser['user']['id'] . "
                                     ORDER BY comments.date_updated, likes.date_updated, likes.date_updated, mates.date_updated, posts.date_updated ASC"));*/

        $oUpdates = DB::select(DB::raw("SELECT * FROM updates WHERE
                                    status = " . Update::UPDATE_STATUS_ACTIVE . " OR
                                    status = " . Update::UPDATE_STATUS_ACTIVATED_BY_USER . " OR
                                    status = " . Update::UPDATE_STATUS_ACTIVATED_BY_ADMIN . " AND
                                    user_id IN (" .  $sUserIDS . ")
                                    ORDER BY id DESC
                                    LIMIT $iOffset, $iLimit"));


        $aUpdates = (json_decode(json_encode($oUpdates), true));

        for($i = 0; $i < count($aUpdates); $i++){
            $aUpdates[$i]['user'] = User::where('id', $aUpdates[$i]['user_id'])->first()->toArray();
            switch($aUpdates[$i]['update_type']){
                case Update::UPDATE_TYPE_USER:
                    break;
                case Update::UPDATE_TYPE_SPECY:
                    break;
                case Update::UPDATE_TYPE_FAMILY:
                    break;
                case Update::UPDATE_TYPE_CHARACTER:
                    $aUpdates[$i]['character'] = Character::where('id', $aUpdates[$i]['character_id'])->first()->toArray();
                    break;
                case Update::UPDATE_TYPE_MATE:
                    break;
                case Update::UPDATE_TYPE_COMMENT:
                    $aUpdates[$i]['comment'] = Comment::where('id', $aUpdates[$i]['comment_id'])->first()->toArray();
                    $aUpdates[$i]['comment']['from_user'] = User::where('id', $aUpdates[$i]['comment']['from_user_id'])->first()->toArray();
                    $aUpdates[$i]['comment']['to_user'] = User::where('id', $aUpdates[$i]['comment']['to_user_id'])->first()->toArray();
                    switch($aUpdates[$i]['comment']['comment_from_type']){
                        case Comment::COMMENT_FROM_TYPE_USER:break;
                        case Comment::COMMENT_FROM_TYPE_CHARACTER:break;
                        case Comment::COMMENT_FROM_TYPE_FAMILY:break;
                        case Comment::COMMENT_FROM_TYPE_SPECY:break;
                        case Comment::COMMENT_FROM_TYPE_PHOTO:
                            $aUpdates[$i]['comment']['photo'] = Photo::where('id', $aUpdates[$i]['comment']['photo_id'])->first()->toArray();
                            break;
                        case Comment::COMMENT_FROM_TYPE_POST:break;
                        case Comment::COMMENT_FROM_TYPE_MATE:break;
                    }

                    $htmlView = $htmlView . (String) view('users.pages.partials.comment-show')->with('aUpdate', $aUpdates[$i]);

                    break;
                case Update::UPDATE_TYPE_PHOTO:
                    break;
                case Update::UPDATE_TYPE_LIKE:
                    $aUpdates[$i]['like'] = Like::where('id', $aUpdates[$i]['like_id'])->first()->toArray();
                    break;
                case Update::UPDATE_TYPE_POST:
                    $aUpdates[$i]['post'] = Post::where('id', $aUpdates[$i]['post_id'])->first()->toArray();
                    break;
            }
        }

        return response()->json([
            'status' => true,
            'message' => "Successfully submitted comment",
            'view'  => (String) $htmlView
        ]);
    }
}
