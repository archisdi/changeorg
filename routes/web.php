<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\DB;
use App\Petition;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',function (){

    $title = 'Our Mentors';

    $body = ['Edwina','Annisa','Faisal','Septian','Isa'];

    return view('home',compact('title','body'));

});

Route::get('hello/{nama}',function ($nama){
    return 'Hello '. $nama;
});

/// --- CRUD Petition ---- ///

// -- Show all petition data
Route::get('petitions','PetitionController@index');

// -- Create a new petition
Route::get('petitions/create','PetitionController@create');
Route::post('petitions','PetitionController@store');

// -- Update exsisting petition data
Route::get('petitions/{id}/edit','PetitionController@edit');
Route::put('petitions/{id}','PetitionController@update');

// -- Delete existing petition data
Route::delete('petitions/{id}','PetitionController@destroy');

// -- Show specific petition data
Route::get('petitions/{id}','PetitionController@show');


