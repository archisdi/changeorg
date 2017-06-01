<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PetitionRequest;
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

    public function store(PetitionRequest $request){

        $input =  $request->input();

        $petition = New Petition($input);

        $petition->save();

        return redirect(url('petitions'));
    }


    public function edit($id){
        $petition = Petition::find($id);
        return view('petition.edit',compact('petition'));
    }

    public function update(PetitionRequest $request, $id){
        $petition = Petition::find($id);

        $input =  $request->input();

        $petition->update($input);

        return redirect(url('petitions/'.$id));
    }

    public function destroy($id){
        $petition = Petition::find($id);

        $petition->delete();

        return redirect(url('petitions'));
    }

    public function storeComment(CommentRequest $request, $id){
        $petition = Petition::find($id);

        $comment = New Comment($request->input());

        $petition->comments()->save($comment);

        return redirect(url('petitions/'.$id));
    }
}