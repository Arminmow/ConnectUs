<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likeable';

    public function likeable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->blongsTo('\App\Models\User' , 'user_id');
    }

}
