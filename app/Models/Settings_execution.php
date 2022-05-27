<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings_execution extends Model
{
    use HasFactory;
    protected $fillable=[
        'execution_name','view','upload','download','comments','parent_id'
    ];
}
