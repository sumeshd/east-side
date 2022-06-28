<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Comment;
use App\Models\User;

class Presales extends Model
{
    use HasFactory;
    protected $fillable=[
        'presales_name','description','presales_image','view','upload','download','comments','parent_id','settings_name'
    ];


    //  public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function precomments()
    {
        return $this->hasMany(Comment::class, 'presales_id','id');
    }
}
