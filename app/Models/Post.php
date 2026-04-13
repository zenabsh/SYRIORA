<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

      public function location(){
        return $this->belongsTo(Location::class);
    }

     public function status(){
        return $this->belongsTo(Status::class);
    }


    public function reactions(){
        return $this->hasMany(Reaction::class);
    }


      public function comments(){
        return $this->hasMany(Comment::class);
    }

         public function poststatushistory(){
        return $this->hasMany(PostStatusHistory::class);
    }
     public function user()
{
    return $this->belongsTo(User::class);
}


}
