<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected $table = 'petitions';

    protected $fillable = ['title','body'];

    public function when(){
        return $this->created_at->diffForHumans();
    }
}
