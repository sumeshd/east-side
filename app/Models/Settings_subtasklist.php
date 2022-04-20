<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings_subtasklist extends Model
{
    use HasFactory;
    protected $fillable=['subtasklist','tasklist_id','view','upload','download','comments'];
}
