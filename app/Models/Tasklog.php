<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasklog extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id','task_id','field_name','field_data'
    ];
}
