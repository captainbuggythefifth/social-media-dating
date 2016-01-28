<?php

namespace App\Http\Controllers;

use App\Character;
use App\Comment;
use App\Family;
use App\Like;
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

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index(){
        return "ALALAH!";
    }


    function get_comments_by_photo_id(){
        $iFromType = Input::get('from_type');
        $iFromID = Input::get('from_id');
        $aLoggedInUser = User::where('id', Session::get('user')['id'])->first()->toArray();
        switch($iFromType){
            case Comment::COMMENT_FROM_TYPE_USER:
                $aFromItem = User::where('id', $iFromID)->first()->toArray();

                $oItemLikers = Like::where('like_type', Like::LIKE_TYPE_USER)->where('user_id', $aFromItem['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                $aFromItem['likers'] = is_array($oItemLikers->toArray()) && count($oItemLikers->toArray()) ? $oItemLikers->toArray() : [];
                $aFromItem['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aFromItem['likers'], $aLoggedInUser['id']);

                $oComments = Comment::where('user_id', $iFromID)->where('status', Comment::COMMENT_STATUS_DEFAULT)->get();
                break;
            case Comment::COMMENT_FROM_TYPE_CHARACTER:
                $aFromItem = Character::where('id', $iFromID)->first()->toArray();

                $oItemLikers = Like::where('like_type', Like::LIKE_TYPE_CHARACTER)->where('character_id', $aFromItem['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                $aFromItem['likers'] = is_array($oItemLikers->toArray()) && count($oItemLikers->toArray()) ? $oItemLikers->toArray() : [];
                $aFromItem['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aFromItem['likers'], $aLoggedInUser['id']);

                $oComments = Comment::where('character_id', $iFromID)->where('status', Comment::COMMENT_STATUS_DEFAULT)->get();
                break;
            case Comment::COMMENT_FROM_TYPE_FAMILY:
                $aFromItem = Family::where('id', $iFromID)->first()->toArray();

                $oItemLikers = Like::where('like_type', Like::LIKE_TYPE_FAMILY)->where('family_id', $aFromItem['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                $aFromItem['likers'] = is_array($oItemLikers->toArray()) && count($oItemLikers->toArray()) ? $oItemLikers->toArray() : [];
                $aFromItem['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aFromItem['likers'], $aLoggedInUser['id']);

                $oComments = Comment::where('family_id', $iFromID)->where('status', Comment::COMMENT_STATUS_DEFAULT)->get();
                break;
            case Comment::COMMENT_FROM_TYPE_SPECY:
                $aFromItem = Specy::where('id', $iFromID)->first()->toArray();

                $oItemLikers = Like::where('like_type', Like::LIKE_TYPE_SPECY)->where('specy_id', $aFromItem['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                $aFromItem['likers'] = is_array($oItemLikers->toArray()) && count($oItemLikers->toArray()) ? $oItemLikers->toArray() : [];
                $aFromItem['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aFromItem['likers'], $aLoggedInUser['id']);

                $oComments = Comment::where('specy_id', $iFromID)->where('status', Comment::COMMENT_STATUS_DEFAULT)->get();
                break;
            case Comment::COMMENT_FROM_TYPE_PHOTO:
                $aFromItem = Photo::where('id', $iFromID)->first()->toArray();

                $oItemLikers = Like::where('like_type', Like::LIKE_TYPE_PHOTO)->where('photo_id', $aFromItem['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                $aFromItem['likers'] = is_array($oItemLikers->toArray()) && count($oItemLikers->toArray()) ? $oItemLikers->toArray() : [];
                $aFromItem['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aFromItem['likers'], $aLoggedInUser['id']);

                $oComments = Comment::where('photo_id', $iFromID)->where('status', Comment::COMMENT_STATUS_DEFAULT)->get();
                break;
            case Comment::COMMENT_FROM_TYPE_POST:
                $aFromItem = Post::where('id', $iFromID)->first()->toArray();

                $oItemLikers = Like::where('like_type', Like::LIKE_TYPE_POST)->where('post_id', $aFromItem['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                $aFromItem['likers'] = is_array($oItemLikers->toArray()) && count($oItemLikers->toArray()) ? $oItemLikers->toArray() : [];
                $aFromItem['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aFromItem['likers'], $aLoggedInUser['id']);

                $oComments = Comment::where('post_id', $iFromID)->where('status', Comment::COMMENT_STATUS_DEFAULT)->get();
                break;
            case Comment::COMMENT_FROM_TYPE_MATE:
                $aFromItem = Mate::where('id', $iFromID)->first()->toArray();

                $oItemLikers = Like::where('like_type', Like::LIKE_TYPE_MATE)->where('mate_id', $aFromItem['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                $aFromItem['likers'] = is_array($oItemLikers->toArray()) && count($oItemLikers->toArray()) ? $oItemLikers->toArray() : [];
                $aFromItem['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aFromItem['likers'], $aLoggedInUser['id']);

                $oComments = Comment::where('mate_id', $iFromID)->where('status', Comment::COMMENT_STATUS_DEFAULT)->get();
                break;
            default:
                $aFromItem = User::where('id', $iFromID)->first()->toArray();

                $oItemLikers = Like::where('like_type', Like::LIKE_TYPE_USER)->where('user_id', $aFromItem['id'])->where('status', Like::LIKE_STATUS_ACTIVE)->get();
                $aFromItem['likers'] = is_array($oItemLikers->toArray()) && count($oItemLikers->toArray()) ? $oItemLikers->toArray() : [];
                $aFromItem['logged_in_user']['has_liked'] = LikesController::checkHasLikedInArray($aFromItem['likers'], $aLoggedInUser['id']);

                $oComments = Comment::where('user_id', $iFromID)->where('status', Comment::COMMENT_STATUS_DEFAULT)->get();
                break;

        }

        $oComments = is_array($oComments->toArray()) && count($oComments->toArray() > 0) ? $oComments->toArray() : [];

        $aComments = null;
        $iFromWhereID = null;
        for($i = 0; $i < count($oComments); $i++){
            $aComments[$i] = $oComments[$i];
            $aComments[$i]['from_user'] = User::where('id', $oComments[$i]['from_user_id'])->first()->toArray();
            if($oComments[$i]['comment_photo_id'] > 0){
                $aComments[$i]['photo_comment'] = Photo::where('id', $oComments[$i]['comment_photo_id'])->first()->toArray();
            }
            $iFromType = $oComments[$i]['comment_from_type'];
            switch($iFromType){
                case Comment::COMMENT_FROM_TYPE_USER;
                    $iFromWhereID = "user_id";
                    $aComments[$i]['from'] = User::where('id', $oComments[$i][$iFromWhereID])->first()->toArray();
                    break;
                case Comment::COMMENT_FROM_TYPE_CHARACTER;
                    $iFromWhereID = "character_id";
                    $aComments[$i]['from'] = Character::where('id', $oComments[$i][$iFromWhereID])->first()->toArray();
                    break;
                case Comment::COMMENT_FROM_TYPE_FAMILY:
                    $iFromWhereID = "family_id";
                    $aComments[$i]['from'] = Family::where('id', $oComments[$i][$iFromWhereID])->first()->toArray();
                    break;
                case Comment::COMMENT_FROM_TYPE_SPECY:
                    $iFromWhereID = "specy_id";
                    $aComments[$i]['from'] = Specy::where('id', $oComments[$i][$iFromWhereID])->first()->toArray();
                    break;
                case Comment::COMMENT_FROM_TYPE_PHOTO:
                    $iFromWhereID = "photo_id";
                    $aComments[$i]['from'] = Photo::where('id', $oComments[$i][$iFromWhereID])->first()->toArray();
                    break;
                case Comment::COMMENT_FROM_TYPE_POST:
                    $iFromWhereID = "post_id";
                    $aComments[$i]['from'] = Post::where('id', $oComments[$i][$iFromWhereID])->first()->toArray();
                    break;
                case Comment::COMMENT_FROM_TYPE_MATE:
                    $iFromWhereID = "mate_id";
                    $aComments[$i]['from'] = Mate::where('id', $oComments[$i][$iFromWhereID])->first()->toArray();
                    break;
                default:
                    $iFromWhereID = "user_id";
                    $aComments[$i]['from'] = User::where('id', $oComments[$i][$iFromWhereID])->first()->toArray();
                    break;
            }
        }

        $view = view('users.comments.show')->with('aComments', $aComments);

        $htmlFromWhatView = view('users.comments.partials.partial-comment-from-what-display')
            ->with('aFromItem', $aFromItem)
            ->with('iFromType', $iFromType);

        if($oComments){
            return response()->json([
                'view' => (String) $view,
                'status' => true,
                'message' => "Successfully archived character",
                'what_to_display' => (String) $htmlFromWhatView
            ]);
        }
        else{
            $htmlFromWhatView = view('users.comments.partials.partial-comment-from-what-display')
                ->with('aFromItem', $aFromItem)
                ->with('iFromType', $iFromType);

            $view = view('users.comments.show')->with('aComments', []);
            if($htmlFromWhatView != ""){
                return response()->json([
                    'view' => (String) $view,
                    'status' => true,
                    'message' => "Successfully archived character",
                    'what_to_display' => (String) $htmlFromWhatView
                ]);
            }
            else{
                echo json_encode(array(
                    'status' => false,
                    'message' => "Something went wrong. Please try again later"
                ));
            }

        }
        die();
    }

    function create(Request $request){
        if(Session::has('user')){
            //Check the type of comment type to determine what id is to be inserted [photo_id, character_id, family_id, specy_id, post_id, mate_id]
            $iFromType = Input::get('comment-from-type');
            $iFromWhereID = null;
            $iCommentPhotoID = 0;
            $aComment = [];
            switch($iFromType){
                case Comment::COMMENT_FROM_TYPE_USER;
                    $iFromWhereID = "user_id";
                    break;
                case Comment::COMMENT_FROM_TYPE_CHARACTER;
                    $iFromWhereID = "character_id";
                    break;
                case Comment::COMMENT_FROM_TYPE_FAMILY:
                    $iFromWhereID = "family_id";
                    break;
                case Comment::COMMENT_FROM_TYPE_SPECY:
                    $iFromWhereID = "specy_id";
                    break;
                case Comment::COMMENT_FROM_TYPE_PHOTO:
                    $iFromWhereID = "photo_id";
                    break;
                case Comment::COMMENT_FROM_TYPE_POST:
                    $iFromWhereID = "post_id";
                    break;
                case Comment::COMMENT_FROM_TYPE_MATE:
                    $iFromWhereID = "mate_id";
                    break;
            }

            $oComment = Comment::create([
                'from_user_id' => Session::get('user')['id'],
                'to_user_id'    => Input::get('comment-to-user-id'),
                'comment_text'  => Input::get('comment-text'),
                'status'        => Comment::COMMENT_STATUS_DEFAULT,
                'comment_type'  => $request->file('comment-photo') != null ? Comment::COMMENT_TYPE_PHOTO : Comment::COMMENT_TYPE_TEXT,
                'comment_from_type' => Input::get('comment-from-type'),
                $iFromWhereID => Input::get('comment-from-id'),
                'comment_photo_id'  => $iCommentPhotoID
            ]);

            //Check if there's a file
            if($request->file('comment-photo') != null){
                $sInputImageName = str_replace(' ', '_', (Input::get('comment-to-user-id') . '_' . $request->file('comment-photo')->getClientOriginalName()));
                $sImageName = rand(1, 1000000) . '_' . Session::get('user')['id'] . '_' . $sInputImageName;
                $request->file('comment-photo')->move(base_path() . '/public/' . Photo::PHOTO_LINK_COMMENT, $sImageName);
                $oPhoto = Photo::create([
                    'user_id' => Session::get('user')['id'],
                    'photo_type' => Photo::PHOTO_TYPE_COMMENT,
                    'photo_link' => Photo::PHOTO_LINK_COMMENT . $sImageName,
                    'status'    => Photo::PHOTO_STATUS_DEFAULT,
                ]);
                $iCommentPhotoID = $oPhoto->toArray()['id'];
                if($oPhoto){
                    Comment::where('id', $oComment->toArray()['id'])->update([
                        'comment_photo_id'  => $iCommentPhotoID
                    ]);
                }
            }

            if($oComment){
                $aComment = Comment::where('id', $oComment->toArray()['id'])->first()->toArray();
                $aNotification = Notification::create([
                    'from_user_id' => Session::get('user')['id'],
                    'to_user_id'    => Input::get('comment-to-user-id'),
                    'notification_type' => Notification::NOTIFICATION_TYPE_COMMENT,
                    'status'    => Notification::NOTIFICATION_STATUS_ACTIVE,
                    'comment_id'   => $aComment['id']
                ]);

                Update::create([
                    'user_id' => Session::get('user')['id'],
                    'update_type'   => Update::UPDATE_TYPE_COMMENT,
                    'comment_id'    => $aComment['id'],
                    'status'    => Update::UPDATE_STATUS_ACTIVE
                ]);

                //FOR DISPLAY
                $aComment['from_user'] = User::where('id', Session::get('user')['id'])->first()->toArray();
                $aComment['photo_comment'] = $aComment['comment_photo_id'] > 0 ? Photo::where('id', $aComment['comment_photo_id'])->first()->toArray() : [];
            }
            $view = view('users.comments.partials.partial-comment-owner')->with('aComment', $aComment);

            if($aComment){
                return response()->json([
                    'status' => true,
                    'message' => "Successfully submitted comment",
                    'view'  => (String) $view
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Something went wrong. Please try again",
                ]);
            }
        }
    }

}