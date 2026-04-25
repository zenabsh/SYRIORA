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
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
     public function savedBy()
    {
        return $this->belongsToMany(User::class, 'saved');
    }

    public function sharedBy()
    {
        return $this->belongsToMany(User::class, 'shared');
    }

    public function viewedBy()
    {
        return $this->belongsToMany(User::class, 'views');
    }

      /*   public function poststatushistory(){
        return $this->hasMany(PostStatusHistory::class);
    }*/
     public function user()
{
    return $this->belongsTo(User::class);
}
public function getStatusLabelAttribute()
{
    return match ($this->status) {
        'pending' => 'قيد الانتظار',
        'approved' => 'موافق عليها',
        'rejected' => 'مرفوضة',
        'completed' => 'مكتملة',
        default => $this->status,
    };
}

}
