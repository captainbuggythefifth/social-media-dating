<?php

namespace App\Http\Controllers;

use App\Character;
use App\Like;
use App\Family;
use App\Mate;
use App\Notification;
use App\Photo;
use App\Post;
use App\Specy;
use App\Update;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index(){
        return "ALALAH!";
    }

    function create(){
        if(Session::has('user')){
            $aLike = [
                'liked' => false,
                'unliked'   => false
            ];
            $iLikeFromType = Input::get('like_from_type');
            $iToUserID = Input::get('to_user_id');
            $iUserID = Session::get('user')['id'];
            $iLikeFromID = Input::get('like_from_id');
            switch($iLikeFromType){
                case Like::LIKE_TYPE_USER;
                    $iFromWhereID = "user_id";
                    break;
                case Like::LIKE_TYPE_CHARACTER;
                    $iFromWhereID = "character_id";
                    break;
                case Like::LIKE_TYPE_FAMILY:
                    $iFromWhereID = "family_id";
                    break;
                case Like::LIKE_TYPE_SPECY:
                    $iFromWhereID = "specy_id";
                    break;
                case Like::LIKE_TYPE_PHOTO:
                    $iFromWhereID = "photo_id";
                    break;
                case Like::LIKE_TYPE_POST:
                    $iFromWhereID = "post_id";
                    break;
                case Like::LIKE_TYPE_MATE:
                    $iFromWhereID = "mate_id";
                    break;
                case Like::LIKE_TYPE_COMMENT:
                    $iFromWhereID = "comment_id";
            }

            //If no result on hasLiked, create like
            $oResultHasLike = self::hasLiked($iFromWhereID, $iToUserID ,$iUserID, $iLikeFromType, $iLikeFromID);
            if(!($oResultHasLike)){
                $oResult = Like::create([
                    'from_user_id' => $iUserID,
                    'to_user_id'    => $iToUserID,
                    'like_type'     => $iLikeFromType,
                    $iFromWhereID   => $iLikeFromID
                ]);
                Update::create([
                    'user_id' => $iUserID,
                    'update_type'   => Update::UPDATE_TYPE_LIKE,
                    'like_id'       => $oResult['id'],
                    'status'        => Update::UPDATE_STATUS_ACTIVE
                ]);
                if($oResult){
                    $aLike['liked'] = true;
                    return response()->json([
                        'status' => true,
                        'message' => "Successfully liked",
                        'like' => json_encode($aLike)
                    ]);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => "Something went wrong. Please try again later"
                    ]);
                }
            }//Unlike
            else{
                $bResult = Like::where('id', $oResultHasLike['id'])->update([
                    'status' => Like::LIKE_STATUS_DISLIKED_BY_USER
                ]);
                Update::where('like_id', $oResultHasLike['id'])->update([
                    'status' => Update::UPDATE_STATUS_DEACTIVATED_BY_USER
                ]);
                if($bResult){
                    $aLike['unliked'] = true;
                    return response()->json([
                        'status' => true,
                        'message' => "Successfully disliked",
                        'like' => json_encode($aLike)
                    ]);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => "Something went wrong. Please try again later"
                    ]);
                }
            }
        }

    }

    
    function unLike(){
        
    }


    public static function hasLiked($iFromWhereID, $iToUserID ,$iUserID, $iLikeFromType, $iLikeFromID){
        $oResult = Like::where($iFromWhereID, $iLikeFromID)->where('to_user_id', $iToUserID)->where('from_user_id', $iUserID)->where('status', Like::LIKE_STATUS_ACTIVE)->get();
        if($oResult->first()){
            return $oResult->first()->toArray();
        }
        else{
            return false;
        }
    }

    public static function checkHasLikedInArray($aToBeSearchedOns, $iToSearched){
        foreach($aToBeSearchedOns as $aToBeSearchedOn){
            if(in_array($iToSearched, $aToBeSearchedOn)){
                return true;
            }
        }
        return false;
    }

    /*public static function getLikers($iFromID, $sLikeType){
        $aLikers = [];
        switch($sLikeType){
            case Like::LIKE_TYPE_USER:
                $aLikers = User::where('id', $iFromID)->get()->toArray();
                break;
            case Like::LIKE_TYPE_CHARACTER:
                $aLikers = Character::where('id', $iFromID)->get()->toArray();
                break;
            case Like::LIKE_TYPE_FAMILY:
                $aLikers = Family::where('id', $iFromID)->get()->toArray();
                break;
            case Like::LIKE_TYPE_SPECY:
                $aLikers = Specy::where('id', $iFromID)->get()->toArray();
                break;
        }
    }*/

}