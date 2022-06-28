<?php

namespace App\Models;
use App\Models\Comment;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Execution extends Model
{
    use HasFactory;
    protected $fillable=[
        'execution_name','description','execution_image','view','upload','download','comments','parent_id','settings_name'
    ];



     public function execomments()
    {
        return $this->hasMany(Comment::class, 'execution_id','id');
    }
}
