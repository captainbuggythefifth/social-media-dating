<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateSongRequest;
use App\Http\Controllers\Controller;

use App\Country;
use Illuminate\Support\Facades\Input;

class CountriesController extends Controller{

    private $song;
    public function __constuct(){

    }
    public function index(){

    }

    public function create(){
        return view('songs.create');
    }

    public function store(CreateSongRequest $request){

    }

    public function show($slug){

    }

    public function edit($slug){

    }

    /**
     * @param $slug
     * @return string
     */
    public function update($slug){

    }


}
