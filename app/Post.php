<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
 protected $fillable = [
        'title', 'category','message'
    ];
    
    public function comments(){
        //include comments where startus is approved
       // return $this->hasMany(Comment::class)->where('status','approved');
         return $this->hasMany(Comment::class);
       
    }
    
    public function user(){
        
        return $this->belongsTo(User::class);
    }
    
}
