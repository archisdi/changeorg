<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PetitionRequest;
use App\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index(){
        $petitions = Petition::paginate(5);
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

        Auth::user()->petitions()->save($petition);

        return redirect(url('petitions'));
    }


    public function edit($id){
        $petition = Auth::user()->petitions->where('id',$id)->first();
        return view('petition.edit',compact('petition'));
    }

    public function update(PetitionRequest $request, $id){
        $petition = Auth::user()->petitions->where('id',$id)->first();

        $input =  $request->input();

        $petition->update($input);

        return redirect(url('petitions/'.$id));
    }

    public function destroy($id){
        $petition = Auth::user()->petitions->where('id',$id)->first();

        $petition->delete();

        return redirect(url('petitions'));
    }

    public function storeComment(CommentRequest $request, $id){
        $petition = Petition::find($id);

        $comment = New Comment($request->input());

        $comment['user_id'] = Auth::user()->id;

        $petition->comments()->save($comment);

        return redirect(url('petitions/'.$id));
    }
}