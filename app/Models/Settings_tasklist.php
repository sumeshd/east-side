<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings_tasklist extends Model
{
    use HasFactory;
    protected $fillable=['tasklist','tablist_id'];
}
