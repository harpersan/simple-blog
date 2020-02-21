<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'comment', 'post_id'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
