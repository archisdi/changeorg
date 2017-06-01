<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected $table = 'petitions';

    protected $fillable = ['title','body'];

    // -- Relationship to comments
    public function comments(){
        return $this->HasMany(Comment::class);
    }
}
