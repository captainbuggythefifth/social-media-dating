<?php

namespace App\Http\Controllers;

use App\Character;
use App\Family;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\LogInUserRequest;
use App\Specy;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;

class FamiliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index(){
        return "ALALAH!";
    }

    function get_by_specy(){
        $aFamilies = Family::where('species_id', Input::get('specy_id'))->get();
        /*$sHtml = '<option value="" disabled selected>Choose your Character</option>';
        foreach($aFamilies as $aFamily){

        }*/
        echo json_encode($aFamilies);
        //echo (Family::all()->where('species_id', Input::get('specy_id')));
        exit();
    }

}
