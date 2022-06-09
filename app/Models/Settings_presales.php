<?php

namespace App\Models;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings_presales extends Model
{
    use HasFactory;
    protected $fillable=[
        'presales_name','description','presales_image','view','upload','download','comments','parent_id','settings_name'
    ];


     public function comments()
    {
        return $this->hasMany(Comment::class, 'presalesid','id');
    }


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id','id');
    }
}
