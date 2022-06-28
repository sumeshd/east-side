<?php

namespace App\Models;
use App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postsales extends Model
{
    use HasFactory;
    protected $fillable=[
        'postsales_name','description','postsales_image','view','upload','download','comments','parent_id','settings_name'
    ];

     public function postcomments()
    {
        return $this->hasMany(Comment::class, 'postsales_id','id');
    }
}
