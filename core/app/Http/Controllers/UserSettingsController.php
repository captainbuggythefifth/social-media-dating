<?php

namespace App\Http\Controllers;

use App\Character;
use App\Family;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\LogInUserRequest;
use App\Specy;
use App\UserSetting;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;

class UserSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        if($request->all()){
            User::create([
                'user_name'     => Input::get('user_name'),
                'email_address' => Input::get('email_address'),
                'password'      => Hash::make(Input::get('password')),
                'first_name'    => Input::get('first_name'),
                'last_name'     => Input::get('last_name'),
                'gender'        => intval(Input::get('gender')),
                'country'       => Input::get('country'),
                'birth_date'    => date('y-m-d', strtotime(Input::get('birth_date'))),
            ]);
            $request->session()->put('user', User::where('email_address', Input::get('email_address'))->first()->toArray());
            return redirect('user');
        }
        dd("ALALALH!@");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_name)
    {
        $aUser = User::where('user_name', trim($user_name))->first()->toArray();
        return view('users.users.show')->with('aUser', $aUser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $result = UserSetting::where('user_id', Session::get('user')['id'])->update([
            Input::get('settings_type') => Input::get('option')
        ]);
        if($result){
            echo json_encode(array(
                'status' => true,
                'message' => "Successfully changed profile settings"
            ));
        }
        else{
            echo json_encode(array(
                'status' => false,
                'message' => "Something went wrong. Please try again later"
            ));
        }
    }

    public function update_status()
    {
        $sUpdateType = "";
        $iUpdateValue = 0;
        if(Input::get('status_type') == 'chat'){
            $sUpdateType = 'user_chat_status';
            $iUpdateValue = Input::get('status') == 'true' ? UserSetting::CHAT_STATUS_ENABLED_BY_USER : UserSetting::CHAT_STATUS_DISABLED_BY_USER;
        }
        elseif(Input::get('status_type') == 'profile'){
            $sUpdateType = 'user_profile_status';
            $iUpdateValue = Input::get('status') == 'true' ? UserSetting::PROFILE_STATUS_ENABLED_BY_USER : UserSetting::PROFILE_STATUS_DISABLED_BY_USER;
        }
        elseif(Input::get('status_type') == 'character'){
            $sUpdateType = 'user_character_status';
            $iUpdateValue = Input::get('status') == 'true' ? UserSetting::CHARACTER_STATUS_ENABLED_BY_USER : UserSetting::CHARACTER_STATUS_DISABLED_BY_USER;
        }

        $result = UserSetting::where('user_id', Session::get('user')['id'])->update([
            $sUpdateType => $iUpdateValue
        ]);
        if($result){
            echo json_encode(array(
                'status' => true,
                'message' => "Successfully changed chat settings"
            ));
        }
        else{
            echo json_encode(array(
                'status' => false,
                'message' => "Something went wrong. Please try again later"
            ));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(LogInUserRequest $request){
        /*if(DB::table('users')->where('email_address', Input::get('email_address'))){
            dd("ALAALLAL!");
        }*/
        $oUser = DB::table('users')->where('email_address', Input::get('email_address'))->first();
        //dd(DB::table('users')->where('email_address', Input::get('email_address'))->first()->password);
        /*dd(User::where('email_address', Input::get('email_address'))->first()->toArray());
        if(Hash::check(Input::get('password'), User::where('email_address', Input::get('email_address'))->first()->toArray()['password'])){
            Session::put('user', User::where('email_address', Input::get('email_address'))->first()->toArray());
            dd(Session::all());
        }
        else{
            //
            Session::put('user', User::where('email_address', Input::get('email_address'))->first()->toArray());
            dd(Session::all());
        }*/
        //dd(User::where('email_address', Input::get('email_address'))->first()->toArray());
        /*if(Hash::check(Input::get('password'), DB::table('users')->where('email_address', Input::get('email_address'))->first()->password)){
            Session::put('user', User::where('email_address', Input::get('email_address'))->first()->toArray());
            //dd(Session::all());
        }
        else{
            $email_address = Input::get('email_address');
            return view('users.users.index')->with('email_address', $email_address);
        }*/

        if($request->all()){
            if(Hash::check(Input::get('password'), DB::table('users')->where('email_address', Input::get('email_address'))->first()->password)){
                //Session::put('user', User::where('email_address', Input::get('email_address'))->first()->toArray());
                $request->session()->put('user', User::where('email_address', Input::get('email_address'))->first()->toArray());
                return redirect('user');
            }
            else{
                $email_address = Input::get('email_address');
                return view('users.users.index')->with('email_address', $email_address);
            }
        }

    }
    public function logout(){
        Session::forget('user');
        return redirect('user');
    }

    public function profile($user_name = null){
        if(trim($user_name) == ""){
            if(Session::has('user')){
                $aUser = User::where('id', Session::get('user')['id'])->first()->toArray();
                $aCurrentCharacter = Character::where('id', $aUser['current_character_id'])->first()->toArray();
                $aCharacters = Character::where('user_id', $aUser['id'])->get()->toArray();
                /*if(count($aCharacters) == 0){
                    return view('users.users.show')->with('characters', $aCharacters);
                }*/
                //dd($aCharacters);die();
                $aFamilies = Family::get()->toArray();
                $aSpecies = Specy::get()->toArray();
                return view('users.users.show')->with('aCharacters', $aCharacters)
                    ->with('aFamilies', $aFamilies)->with('aSpecies', $aSpecies)
                    ->with('aCharacters', $aCharacters)
                    ->with('aCurrentCharacter', $aCurrentCharacter);
            }
            else{
                return redirect('user');
            }
        }
        else{

        }
    }

    public function settings(){
        if(Session::has('user')) {
            $aUser = User::where('id', Session::get('user')['id'])->first()->toArray();
            //var_dump($aUser);
            $aCurrentCharacter = Character::where('id', $aUser['current_character_id'])->first()->toArray();
            $aUserDetails = User::where('id', $aUser['id'])->first()->toArray();
            return view('users.users.settings')
                ->with('aCurrentCharacter', $aCurrentCharacter)
                ->with('aUserDetails', $aUserDetails);
        }
    }

}
