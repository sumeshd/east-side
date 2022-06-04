<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings_presales extends Model
{
    use HasFactory;
    protected $fillable=[
        'presales_name','presalestext','presales_image','view','upload','download','comments','parent_id'
    ];
}
