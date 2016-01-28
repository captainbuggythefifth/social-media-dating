<?php

namespace App\Http\Controllers;

use App\Character;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\CreateCharacterRequest;
use App\Http\Requests\LogInUserRequest;
use App\Update;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCharacterRequest $request)
    {
        $sInputImageName = str_replace(' ', '_', (Input::get('character_name') . '_' . $request->file('character_avatar')->getClientOriginalName()));
        $sImageName = rand(1, 1000000) . '_' . Session::get('user')['id'] . '_' . $sInputImageName;
        /*$request->file('character_avatar')->move(base_path().'/public/avatars/characters/normal/', $sImageName);*/
        $request->file('character_avatar')->move(base_path() . '/public/' . Photo::PHOTO_LINK_AVATAR_CHARACTER_NORMAL, $sImageName);
        $filename = base_path() . '/public/' . Photo::PHOTO_LINK_AVATAR_CHARACTER_NORMAL . $sImageName;

        $jpeg_quality = 90;
        $targ_w = $targ_h = intval(150);

        switch($request->file('character_avatar')->getClientOriginalExtension()){
            case 'jpeg':
            case 'jpg':
                $source = imagecreatefromjpeg($filename);
                $img_r = imagecreatefromjpeg($filename);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,Input::get('x'),Input::get('y'),
                    $targ_w,$targ_h,Input::get('w'),Input::get('h'));
                //imagejpeg($dst_r, base_path().'/public/avatars/characters/mini/'. $sImageName, $jpeg_quality);
                header('Content-type: image/jpeg');
                imagejpeg($dst_r, base_path() . '/public/' . Photo::PHOTO_LINK_AVATAR_CHARACTER_MINI . $sImageName, $jpeg_quality);
            break;

            case 'png':
                $source = imagecreatefrompng($filename);
                $img_r = imagecreatefrompng($filename);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,Input::get('x'),Input::get('y'),
                    $targ_w,$targ_h,Input::get('w'),Input::get('h'));
                //imagejpeg($dst_r, base_path().'/public/avatars/characters/mini/'. $sImageName, $jpeg_quality);
                header('Content-type: image/jpeg');
                imagepng($dst_r, base_path() . '/public/' . Photo::PHOTO_LINK_AVATAR_CHARACTER_MINI . $sImageName, 9);
            break;

            case 'gif':
                $source = imagecreatefromgif($filename);
                $img_r = imagecreatefromgif($filename);
                $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                imagecopyresampled($dst_r,$img_r,0,0,Input::get('x'),Input::get('y'),
                    $targ_w,$targ_h,Input::get('w'),Input::get('h'));
                //imagejpeg($dst_r, base_path().'/public/avatars/characters/mini/'. $sImageName, $jpeg_quality);
                header('Content-type: image/jpeg');
                imagegif($dst_r, base_path() . '/public/' . Photo::PHOTO_LINK_AVATAR_CHARACTER_MINI . $sImageName, $jpeg_quality);
            break;

            default:
                $source = imagecreatefromjpeg($filename);
            break;
        }

        /*$proceed = imagecopyresized($thumb, $source, $request->get('x'), $request->get('y'), $request->get('x'), $request->get('y'), $request->get('w'), $request->get('h'), $width, $height);
        if(!$proceed){
            die("error");
        }*/

        $aPhoto = Photo::create([
            'user_id' => Session::get('user')['id'],
            'photo_type' => Photo::PHOTO_TYPE_CHARACTER,
            'photo_link' => Photo::PHOTO_LINK_AVATAR_CHARACTER_MINI . $sImageName,
            'status'    => Photo::PHOTO_STATUS_DEFAULT,
        ]);

        if($request->all()){
            $aCharacter = Character::create([
                'user_id'       => Session::get('user')['id'],
                'families_id'   => Input::get('families_id'),
                'character_name'      => Input::get('character_name'),
                'character_age'    => Input::get('character_age'),
                'character_avatar'     => Photo::PHOTO_LINK_AVATAR_CHARACTER_NORMAL . $sImageName,
                'character_avatar_mini' => Photo::PHOTO_LINK_AVATAR_CHARACTER_MINI . $sImageName,
                'character_description'        => Input::get('character_description'),
                'photo_id'          => $aPhoto['id']
            ]);

            Update::create([
                'user_id' => Session::get('user')['id'],
                'update_type'   => Update::UPDATE_TYPE_CHARACTER,
                'character_id'  => $aCharacter['id'],
                'status'    => Update::UPDATE_STATUS_ACTIVE
            ]);
            return redirect('user');
        }
    }

    public function change_character(Request $request){
        if(Session::has('user')){
            $aCharacter = Character::where('id', Input::get('character_id'))->first()->toArray();
            /*var_dump($aCharacter);
            var_dump(User::where('id', Session::get('user')['id'])->first()->toArray());*/
            if(is_array($aCharacter)){
                User::where('id', Session::get('user')['id'])->update([
                    'current_character_id' => $aCharacter['id'],
                    'current_character_avatar' => $aCharacter['character_avatar'],
                    'current_character_avatar_mini' => $aCharacter['character_avatar_mini']
                ]);
                $aUser = $request->session()->pull('user');
                //$request->session()->flush();
                $request->session()->put('user', User::where('id', $aUser['id'])->first()->toArray());
                //dd(User::where('id', $aUser['id'])->first()->toArray());
                $result = $aCharacter;
                $result['result_message'] = "Successfully changed character";
                echo (json_encode($result));
                exit();
            }
        }
        else{
            return redirect('user');
        }
    }

    public function get_details(){
        $aCharacter = Character::where('id', Input::get('id'))->first()->toArray();
        $result = $aCharacter;
        echo (json_encode($result));
        exit();
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
    public function update(Request $request)
    {
        if($request->file('character_avatar') != null){
            $sInputImageName = str_replace(' ', '_', (Input::get('character_name') . '_' . $request->file('character_avatar')->getClientOriginalName()));
            $sImageName = rand(1, 1000000) . '_' . Session::get('user')['id'] . '_' . $sInputImageName;
            $request->file('character_avatar')->move(base_path() . '/public/' . Photo::PHOTO_LINK_AVATAR_CHARACTER_NORMAL, $sImageName);

            $filename = base_path().'/public/' . Photo::PHOTO_LINK_AVATAR_CHARACTER_NORMAL . $sImageName;

            $jpeg_quality = 90;
            $targ_w = $targ_h = 150;

            switch($request->file('character_avatar')->getClientOriginalExtension()){
                case 'jpeg':
                case 'jpg':
                    $source = imagecreatefromjpeg($filename);
                    $img_r = imagecreatefromjpeg($filename);
                    $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                    imagecopyresampled($dst_r,$img_r,0,0,Input::get('x'),Input::get('y'),
                        $targ_w,$targ_h,Input::get('w'),Input::get('h'));
                    //imagejpeg($dst_r, base_path().'/public/avatars/characters/mini/'. $sImageName, $jpeg_quality);
                    header('Content-type: image/jpeg');
                    imagejpeg($dst_r, base_path() . '/public/' . Photo::PHOTO_LINK_AVATAR_CHARACTER_MINI. $sImageName, $jpeg_quality);
                    break;

                case 'png':
                    $source = imagecreatefrompng($filename);
                    $img_r = imagecreatefrompng($filename);
                    $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                    imagecopyresampled($dst_r,$img_r,0,0,Input::get('x'),Input::get('y'),
                        $targ_w,$targ_h,Input::get('w'),Input::get('h'));
                    //imagejpeg($dst_r, base_path().'/public/avatars/characters/mini/'. $sImageName, $jpeg_quality);
                    header('Content-type: image/jpeg');
                    imagepng($dst_r, base_path() . '/public/' . Photo::PHOTO_LINK_AVATAR_CHARACTER_MINI. $sImageName, 9);
                    break;

                case 'gif':
                    $source = imagecreatefromgif($filename);
                    $img_r = imagecreatefromgif($filename);
                    $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
                    imagecopyresampled($dst_r,$img_r,0,0,Input::get('x'),Input::get('y'),
                        $targ_w,$targ_h,Input::get('w'),Input::get('h'));
                    //imagejpeg($dst_r, base_path().'/public/avatars/characters/mini/'. $sImageName, $jpeg_quality);
                    header('Content-type: image/jpeg');
                    imagegif($dst_r, base_path() . '/public/' . Photo::PHOTO_LINK_AVATAR_CHARACTER_MINI. $sImageName, $jpeg_quality);
                    break;

                default:
                    $source = imagecreatefromjpeg($filename);
                    break;
            }
            $oCharacter = Character::where('id', Input::get('character_id'))->first()->toArray();

            $aPhoto = Photo::create([
                'user_id' => Session::get('user')['id'],
                'photo_type' => Photo::PHOTO_TYPE_CHARACTER,
                'photo_link' => Photo::PHOTO_LINK_AVATAR_CHARACTER_MINI . $sImageName,
                'status'    => Photo::PHOTO_STATUS_DEFAULT,
            ]);

            if($request->all()){
                Character::where('id', Input::get('character_id'))->update([
                    'character_name'      => Input::get('character_name') != "" ? Input::get('character_name') : $oCharacter['character_name'],
                    'character_age'    => Input::get('character_age') != "" ? Input::get('character_age') : $oCharacter['character_age'],
                    'character_avatar'     => Photo::PHOTO_LINK_AVATAR_CHARACTER_NORMAL . $sImageName,
                    'character_avatar_mini' => Photo::PHOTO_LINK_AVATAR_CHARACTER_MINI . $sImageName,
                    'character_description'        => Input::get('character_description') != "" ? Input::get('character_description') : $oCharacter['character_description'],
                    'photo_id'      => $aPhoto['id']
                ]);
                return json_encode(Character::where('id', Input::get('character_id'))->first()->toArray());
            }
        }

        $oCharacter = Character::where('id', Input::get('character_id'))->first()->toArray();
        if($request->all()){
            Character::where('id', Input::get('character_id'))->update([
                'character_name'      => Input::get('character_name') != "" ? Input::get('character_name') : $oCharacter['character_name'],
                'character_age'    => Input::get('character_age') != "" ? Input::get('character_age') : $oCharacter['character_age'],
                'character_description'        => Input::get('character_description') != "" ? Input::get('character_description') : $oCharacter['character_description']
            ]);
            return json_encode(Character::where('id', Input::get('character_id'))->first()->toArray());
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
                $aUser = Session::pull('user');
                $aCharacters = Character::where('user_id', $aUser['id'])->get()->toArray();
                /*if(count($aCharacters) == 0){
                    return view('users.users.show')->with('characters', $aCharacters);
                }*/
                return view('users.users.show')->with('characters', $aCharacters);
            }
            else{
                return redirect('user');
            }
        }
        else{

        }
    }

    public function delete(Request $request){
        $result = Character::where('id', Input::get('character_id'))->update([
            'status' => Character::CHARACTER_STATUS_DELETED_BY_USER
        ]);
        if($result)
            echo json_encode(array(
                'status'  => true,
                'message' => "Successfully deleted"
            ));
        else
            echo json_encode(array(
                'status' => false,
                'message' => "Something went wrong. Please try again later"
            ));
        die();
    }

    public function update_status_archive(Request $request){
        $result = Character::where('id', Input::get('character_id'))->update([
            'status' => Character::CHARACTER_STATUS_DISABLED_BY_USER
        ]);
        $aCharacter = Character::where('id', Input::get('character_id'))->first()->toArray();
        Update::where('character_id', $aCharacter['id'])->update([
            'status' => Update::UPDATE_STATUS_DEACTIVATED_BY_USER
        ]);
        $view = view('users.characters.partials.partials-archived-list-show-characters')->with('aCharacter', $aCharacter);
        if($result)
            return response()->json([
                'view' => (String) $view,
                'status' => true,
                'message' => "Successfully archived character",
            ]);
        else
            echo json_encode(array(
                'status' => false,
                'message' => "Something went wrong. Please try again later"
            ));
        die();
    }

    public function update_status_activate(Request $request){
        $result = Character::where('id', Input::get('character_id'))->update([
            'status' => Character::CHARACTER_STATUS_ENABLED_BY_USER
        ]);
        $aCharacter = Character::where('id', Input::get('character_id'))->first()->toArray();
        Update::where('character_id', $aCharacter['id'])->update([
            'status' => Update::UPDATE_STATUS_ACTIVATED_BY_USER
        ]);
        $view = view('users.characters.partials.partials-active-list-show-characters')->with('aCharacter', $aCharacter);
        if($result)
            return response()->json([
                'view' => (String) $view,
                'status' => true,
                'message' => "Successfully activated character",
            ]);
        else
            echo json_encode(array(
                'status' => false,
                'message' => "Something went wrong. Please try again later"
            ));
        die();
    }

    public static function alalah(){

    }

}
