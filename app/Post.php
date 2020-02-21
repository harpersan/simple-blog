<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['user_id', 'title', 'description', 'images'];

        public function user()
        {
            return $this->hasOne('App\User', 'id', 'user_id');
        }

        public function comment() {
            return $this->hasMany('App\Comment', 'post_id', 'id');
        }
    

    public static function blogPost($skip, $take){
        return  Post::with('user')->orderBy('created_at', 'desc')->skip($skip)->take($take)->get();
    }
}
