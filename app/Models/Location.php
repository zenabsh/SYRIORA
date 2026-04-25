<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
     public function posts(){
        return $this->hasMany(Post::class);


}
public function users(){
        return $this->hasMany(User::class);}


          public function type()
    {
        return $this->belongsTo(LocationType::class, 'location_type_id');
    }

    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }
}


