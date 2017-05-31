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

///
///
///


Route::get('petitions','PetitionController@index');
Route::get('petitions/create','PetitionController@create');
Route::get('petitions/{id}','PetitionController@show');

Route::post('petitions','PetitionController@store');


Route::get('test',function (){
   return view('layout.app');
});