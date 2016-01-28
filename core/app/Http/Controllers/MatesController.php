<?php

namespace App\Http\Controllers;

use App\Character;
use App\Mate;
use App\Notification;
use App\Update;
use App\User;
use App\UserSetting;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MatesController extends Controller
{

    public function index(){


    }

    public function control($sUserName){

    }
    public function create(){
        $aMate = Mate::create([
            'from_user_id' => Input::get('from_user_id'),
            'to_user_id'    => Input::get('to_user_id'),
            'status'        => Mate::MATE_STATUS_ADDED_BY_USER
        ]);

        if($aMate){
            return response()->json([
                'status' => true,
                'message' => "Successfully requested to be a mate",
                'mate' => json_encode($aMate)
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try again",
            ]);
        }
    }

    public function cancel(){

        $oMate = Mate::where('from_user_id', Input::get('from_user_id'))->where('status', Mate::MATE_STATUS_ADDED_BY_USER)->orWhere('status', Mate::MATE_STATUS_ADDED_BY_ADMIN)->first();
        $oMate->update([
            'status' => Mate::MATE_STATUS_CANCELLED_BY_USER
        ]);

        if($oMate){
            $aMate = $oMate->toArray();
            return response()->json([
                'status' => true,
                'message' => "Successfully cancelled mate request",
                'mate' => json_encode($aMate)
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try again",
            ]);
        }
    }

    public function accept(){

        $oMate = Mate::where('from_user_id', Input::get('from_user_id'))->where('status', Mate::MATE_STATUS_ADDED_BY_USER)->orWhere('status', Mate::MATE_STATUS_ADDED_BY_ADMIN)->first();
        $oMate->update([
            'status' => Mate::MATE_STATUS_ACCEPTED_BY_USER
        ]);
        if($oMate){
            $aMate = $oMate->toArray();
            $aUpdate = Update::create([
                'user_id' => Session::get('user')['id'],
                'update_type'   => Update::UPDATE_TYPE_MATE,
                'status'        => Update::UPDATE_STATUS_ACTIVE
            ]);
            $aNotification = Notification::create([
                'from_user_id' => $aMate['to_user_id'],
                'to_user_id'    => $aMate['from_user_id'],
                'notification_type' => Notification::NOTIFICATION_TYPE_MATE_ACCEPTED_REQUEST_BY_USER,
                'status'    => Notification::NOTIFICATION_STATUS_ACTIVE,
                'mate_id'   => $aMate['id']
            ]);
            if($aUpdate){
                return response()->json([
                    'status' => true,
                    'message' => "Successfully accepted",
                    'mate' => json_encode($aMate)
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Something went wrong. Please try again",
                ]);
            }
        }else{
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try again",
            ]);
        }
    }

    public function remove(){

        $oMate = Mate::where('from_user_id', Input::get('from_user_id'))->where('status', Mate::MATE_STATUS_ACCEPTED_BY_USER)->orWhere('status', Mate::MATE_STATUS_ACCEPTED_BY_ADMIN)->first();
        $oMate->update([
            'status' => Mate::MATE_STATUS_REMOVED_BY_USER
        ]);
        Update::where('mate_id', $oMate->id)->update([
            'status'    => Update::UPDATE_STATUS_DEACTIVATED_BY_USER
        ]);
        if($oMate){
            $aMate = $oMate->toArray();
            return response()->json([
                'status' => true,
                'message' => "Successfully removed mate ",
                'mate' => json_encode($aMate)
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Something went wrong. Please try again",
            ]);
        }
    }
}
