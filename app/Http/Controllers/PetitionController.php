<?php

namespace App\Http\Controllers;

use App\Petition;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    public function index(){
        $petitions = Petition::all();
        return view('petition.index',compact('petitions'));
    }

    public function show($id){
        $petition = Petition::find($id);
        return view('petition.show',compact('petition'));
    }


    public function create(){
        return view('petition.create');
    }

    public function store(Request $request){
        $input =  $request->input();

        $petition = New Petition($input);

        $petition->save();

        return redirect(url('petitions'));
    }


    public function edit(){

    }

    public function update(){

    }



    public function destroy(){

    }
}