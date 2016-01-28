<?php

namespace App\Http\Controllers;

use App\Character;
use App\Country;
use App\Family;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\LogInUserRequest;
use App\Photo;
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

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('user')) {

            $aUser = User::where('id', Session::get('user')['id'])->first()->toArray();
            //var_dump($aUser);
            //dd($aUser);

            return redirect("/" . $aUser['user_name']);

            $aCurrentCharacter = Character::where('id', $aUser['current_character_id'])->first()->toArray();
            $aUserDetails = User::where('id', $aUser['id'])->first()->toArray();
            return view('users.users.index')
                ->with('aCurrentCharacter', $aCurrentCharacter)
                ->with('aUserDetails');
        }
        else{
            return view('users.users.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aCountries = Country::all()->toArray();
        return view('users.users.create')
            ->with('aCountries', $aCountries);
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
            $aUser = User::create([
                'user_name'     => Input::get('user_name'),
                'email_address' => Input::get('email_address'),
                'password'      => Hash::make(Input::get('password')),
                'first_name'    => Input::get('first_name'),
                'last_name'     => Input::get('last_name'),
                'gender'        => intval(Input::get('gender')),
                'country'       => Input::get('country'),
                'birth_date'    => date('y-m-d', strtotime(Input::get('birth_date'))),
                'avatar'        => Photo::PHOTO_LINK_AVATAR_USER_DEFAULT
            ]);
            $aCharacter = Character::create([
                'user_id' => $aUser['id'],
                'families_id' => 1,
                'character_name' => $aUser['user_name'],
                'character_age' => 1,
                'character_avatar' => Photo::PHOTO_LINK_AVATAR_CHARACTER_NORMAL_DEFAULT,
                'character_avatar_mini' => Photo::PHOTO_LINK_AVATAR_CHARACTER_MINI_DEFAULT
            ]);
            $aUser->update([
                'current_character_id' => $aCharacter['id']
            ]);
            $request->session()->put('user', User::where('email_address', Input::get('email_address'))->first()->toArray());
            UserSetting::create([
                'user_id'   => User::where('email_address', Input::get('email_address'))->first()->toArray()['id']
            ]);
            return redirect('user/profile');
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
    public function update(Request $request, $id)
    {
        //
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

        $oUser = DB::table('users')->where('email_address', Input::get('email_address'))->first();

        if($request->all()){
            if(Hash::check(Input::get('password'), DB::table('users')->where('email_address', Input::get('email_address'))->first()->password)){
                //Session::put('user', User::where('email_address', Input::get('email_address'))->first()->toArray());
                $request->session()->put('user', User::where('email_address', Input::get('email_address'))->first()->toArray());
                return redirect(redirect()->back()->getTargetUrl());
            }
            else{
                $email_address = Input::get('email_address');
                return view('users.users.index')->with('email_address', $email_address);
            }
        }

    }
    public function logout(){
        Session::forget('user');
        return redirect('/');
    }

    public function profile($user_name = null){
        if(trim($user_name) == ""){
            if(Session::has('user')){

                $aUser['user'] = User::where('id', Session::get('user')['id'])->first()->toArray();
                $aUser['current_character'] = Character::where('id', $aUser['user']['current_character_id'])->first()->toArray();
                $aUser['active_characters'] = Character::where('user_id', $aUser['user']['id'])->where('status', Character::CHARACTER_STATUS_DEFAULT)->orWhere('status', Character::CHARACTER_STATUS_ENABLED_BY_USER)->orWhere('status', Character::CHARACTER_STATUS_ENABLED_BY_ADMIN)->get()->toArray();
                $aUser['inactive_characters'] = Character::where('user_id', $aUser['user']['id'])->where('status', Character::CHARACTER_STATUS_DISABLED_BY_USER)->orWhere('status', Character::CHARACTER_STATUS_INACTIVE)->get()->toArray();

                $aCharacters = Character::get()->toArray();
                $aLoggedInUser['current_character'] = $aUser['current_character'];
                $aFamilies = Family::get()->toArray();
                $aSpecies = Specy::get()->toArray();
                return view('users.users.show')
                    ->with('aUser', $aUser)
                    ->with('aFamilies', $aFamilies)
                    ->with('aSpecies', $aSpecies)
                    ->with('aCharacters', $aCharacters)
                    ->with('aLoggedInUser', $aLoggedInUser);
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

            $aLoggedInUser = null;
            $bOwner = true;
            $oMate = null;
            $bLoggedInUser = Session::has('user');
            if($bLoggedInUser){
                /*if($oUser->toArray()['id'] == Session::get('user')['id']){
                    $bOwner = true;
                }*/
                $aLoggedInUser['user'] = User::where('id', Session::get('user')['id'])->first()->toArray();
                $aLoggedInUser['current_character'] = Character::where('id', $aLoggedInUser['user']['current_character_id'])->first()->toArray();
            }

            $aUser['user'] = User::where('id', Session::get('user')['id'])->first()->toArray();
            $aUser['active_characters'] = Character::where('user_id', $aUser['user']['id'])->where('status', Character::CHARACTER_STATUS_DEFAULT)->orWhere('status', Character::CHARACTER_STATUS_ENABLED_BY_USER)->orWhere('status', Character::CHARACTER_STATUS_ENABLED_BY_ADMIN)->get()->toArray();
            $aUser['inactive_characters'] = Character::where('user_id', $aUser['user']['id'])->where('status', Character::CHARACTER_STATUS_DISABLED_BY_USER)->orWhere('status', Character::CHARACTER_STATUS_INACTIVE)->get()->toArray();
            $aUser['current_character'] = Character::where('id', $aUser['user']['current_character_id'])->first()->toArray();
            $aUser['user_settings'] = UserSetting::where('id', Session::get('user')['id'])->first()->toArray();

            $aLoggedInUser['user'] = $aUser['user'];
            $aLoggedInUser['current_character'] = $aUser['current_character'];

            $aCountries = Country::all()->toArray();

            return view('users.users.settings')
                ->with('aUser', $aUser)
                ->with('aLoggedInUser', $aLoggedInUser)
                ->with('aCountries', $aCountries)
                ->with('bLoggedInUser', $bLoggedInUser)
                ->with('bOwner', $bOwner);
        }
    }

    public function update_profile_avatar(Request $request){
        if($request->file('user_avatar') != null){
            $sInputImageName = str_replace(' ', '_', (Session::get('user')['user_name'] . '_' . $request->file('user_avatar')->getClientOriginalName()));
            $sImageName = rand(1, 1000000) . '_' . Session::get('user')['id'] . '_' . $sInputImageName;
            $request->file('user_avatar')->move(base_path().'/public/' . Photo::PHOTO_LINK_AVATAR_USER, $sImageName);

            $filename = base_path().'/public/' . Photo::PHOTO_LINK_AVATAR_USER . $sImageName;

            $aPhoto = Photo::create([
                'user_id' => Session::get('user')['id'],
                'photo_type' => Photo::PHOTO_TYPE_USER,
                'photo_link' => Photo::PHOTO_LINK_AVATAR_USER . $sImageName,
                'status'    => Photo::PHOTO_STATUS_DEFAULT,
            ]);

            $result = User::where('id', Session::get('user')['id'])->update([
                'avatar' => Photo::PHOTO_LINK_AVATAR_USER . $sImageName,
                'photo_id'  => $aPhoto['id']
            ]);

            if($result){
                return response()->json([
                    'link' => (String) Photo::PHOTO_LINK_AVATAR_USER . $sImageName,
                    'status' => true,
                    'message' => "Successfully archived character",
                ]);
            }
            else{
                return response()->json([
                    'status' => false,
                    'message' => "Something went wrong. Please try again",
                ]);
            }

        }
    }

    public function update_profile_name(Request $request){
        if(Session::has('user')){
            if($request->all()){
                $result = User::where('id', Session::get('user')['id'])->update([
                    'first_name' => Input::get('first_name'),
                    'middle_name' => Input::get('middle_name'),
                    'last_name' => Input::get('last_name')
                ]);
                if($result){
                    return response()->json([
                        'status' => true,
                        'message' => "Successfully updated name",
                    ]);
                }
                else{
                    return response()->json([
                        'status' => false,
                        'message' => "Something went wrong. Please try again",
                    ]);
                }
            }
        }
    }

    public function update_profile_email_address(Request $request){
        if(Session::has('user')){
            if($request->all()){
                if(filter_var(Input::get('email_address'), FILTER_VALIDATE_EMAIL)){
                    $result = User::where('id', Session::get('user')['id'])->update([
                        'email_address' => Input::get('email_address'),
                    ]);
                    if($result){
                        return response()->json([
                            'status' => true,
                            'message' => "Successfully updated email address",
                        ]);
                    }
                    else{
                        return response()->json([
                            'status' => false,
                            'message' => "Something went wrong. Please try again",
                        ]);
                    }
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => "Please type in a valid e-mail address",
                    ]);
                }
            }
        }
    }

    public function update_profile_password(Request $request){
        if(Session::has('user')){
            if($request->all()){
                if(Hash::check(Input::get('old_password'), User::where('id', Session::get('user')['id'])->first()->password)){
                    if(Input::get('new_password') == Input::get('new_password_retype')){
                        $result = User::where('id', Session::get('user')['id'])->update([
                            'password' => Hash::make(Input::get('new_password'))
                        ]);
                        if($result){
                            return response()->json([
                                'status' => true,
                                'message' => "Successfully updated password",
                            ]);
                        }
                        else{
                            return response()->json([
                                'status' => false,
                                'message' => "Something went wrong. Please try again",
                            ]);
                        }
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => "The retyped password does not match. Please try again",
                        ]);
                    }
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => "Your password does not with the old password you typed in. Please try again",
                    ]);
                }

            }
        }
    }

    public function update_profile_birth_date(Request $request){
        if(Session::has('user')){
            if($request->all()){
                $result = User::where('id', Session::get('user')['id'])->update([
                    'birth_date' => date('y-m-d', strtotime(Input::get('birth_date'))),
                ]);
                if($result){
                    return response()->json([
                        'status' => true,
                        'message' => "Successfully updated birth date",
                    ]);
                }
                else{
                    return response()->json([
                        'status' => false,
                        'message' => "Something went wrong. Please try again",
                    ]);
                }
            }
        }
    }

    public function update_profile_country(Request $request){
        if(Session::has('user')){
            if($request->all()){
                $result = User::where('id', Session::get('user')['id'])->update([
                    'country' => date('y-m-d', strtotime(Input::get('country'))),
                ]);
                if($result){
                    return response()->json([
                        'status' => true,
                        'message' => "Successfully updated country",
                    ]);
                }
                else{
                    return response()->json([
                        'status' => false,
                        'message' => "Something went wrong. Please try again",
                    ]);
                }
            }
        }
    }
    public function update_profile_gender(Request $request){
        if(Session::has('user')){
            if($request->all()){
                $result = User::where('id', Session::get('user')['id'])->update([
                    'gender' => Input::get('gender'),
                ]);
                if($result){
                    return response()->json([
                        'status' => true,
                        'message' => "Successfully updated gender",
                    ]);
                }
                else{
                    return response()->json([
                        'status' => false,
                        'message' => "Something went wrong. Please try again",
                    ]);
                }
            }
        }
    }

}
