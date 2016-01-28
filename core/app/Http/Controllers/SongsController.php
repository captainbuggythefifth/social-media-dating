<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateSongRequest;
use App\Http\Controllers\Controller;

use App\Song;
use Illuminate\Support\Facades\Input;

class SongsController extends Controller{

    private $song;
    public function __constuct(Song $song){
        $this->song = $song;
    }
    public function index(){
        $songs = Song::get();
        return view('songs.index', compact('songs'));
    }

    public function create(){
        return view('songs.create');
    }

    public function store(CreateSongRequest $request){
        Song::create($request->all());
        return redirect('songs');
    }

    public function show($slug){
        //Song::find($id);
        return view('songs.show')->with('song', Song::where('slug', $slug)->first());
        //$song = Song::where('slug', $slug)->first();
        //return view('songs.show')->with('song', compact('song'));
    }

    public function edit($slug){
        return view('songs.edit')->with('song', Song::where('slug', $slug)->first());
    }

    /**
     * @param $slug
     * @return string
     */
    public function update($slug){

        /*dd(Song::where('slug', $slug)->first()->toArray());*/
        /*$song = Song::where('slug', $slug)->first();
        $song->title = Input::get('title');
        $song->lyrics = Input::get('lyrics');
        $song->save();*/


        Song::where('slug', $slug)->first()->fill(['title' => Input::get('title'),
                                                    'lyrics' => Input::get('lyrics')])->save();

        return redirect('songs');
    }


}
