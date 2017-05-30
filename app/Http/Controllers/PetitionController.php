<?php

namespace App\Http\Controllers;

use App\Petition;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    public function index(){
        $petitions = Petition::all();
        return $petitions;
    }

    public function show($id){
        $petitions = Petition::find($id);
        return $petitions;
    }

//    public function create(){
//
//    }
//
//    public function store(){
//
//    }
//
//    public function edit(){
//
//    }
//
//    public function update(){
//
//    }
//
//    public function destroy(){
//
//    }
}
