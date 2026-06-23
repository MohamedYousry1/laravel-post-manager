<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// #[Fillable(['title'])]
class Post extends Model
{
    // protected from mass assignment vulnerabilities
    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];
    // If you choose to unguard your model, you should take special care to always hand-craft the arrays passed to Eloquent's fill, create, and update methods:
    // protected $guarded = []; 

    // It means Post Model belongs to User Model --> to make relation between Post and User
    public function user(){ // function name dependes on foregin key(user_id) --> function user
        return $this->belongsTo(User::class);
    }
    
    // public function postCreator(){ // see while not use nameing that laravel use 
    //     return $this->belongsTo(User::class, 'user_id'); // that meant you dont have col in user table called post_creator_id but it aiming to foregin key(user_id)
    // }
}
