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
        return $this->BelongsTo(Petition::class);
    }

    public function user(){
        return $this->BelongsTo(User::class);
    }
}
