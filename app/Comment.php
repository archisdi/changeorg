<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body'
    ];

    // -- Relationship to petition
    public function petition(){
        return $this->HasMany(Petition::class);
    }
}
