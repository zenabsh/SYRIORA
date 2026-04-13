<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostStatusHistory extends Model
{
        public function posts(){
        return $this->hasMany(Post::class);


} public function users(){
        return $this->hasMany(User::class);


}

 public function status(){
        return $this->belongsTo(Status::class);
    }
}
