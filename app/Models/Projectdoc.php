<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectdoc extends Model
{
    use HasFactory;
    protected $fillable=['project_id','project_settings_id','user_id','document_name','document_path'];
}
