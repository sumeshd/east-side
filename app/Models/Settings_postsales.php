<?php

namespace App\Models;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings_postsales extends Model
{
    use HasFactory;
    protected $fillable=[
        'postsales_name','description','postsales_image','view','upload','download','comments','parent_id','settings_name'
    ];
    //  public function comments()
    // {
    //     return $this->hasMany(Comment::class, 'postsales','id');
    // }
}
