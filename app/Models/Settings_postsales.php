<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings_postsales extends Model
{
    use HasFactory;
    protected $fillable=[
        'postsales_name','postsalestext','postsales_image','view','upload','download','comments','parent_id'
    ];
}
