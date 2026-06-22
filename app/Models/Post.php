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
}
