<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_settings extends Model
{
    use HasFactory;
    protected $fillable=[
        'project_id','type','parent_id','check_id','name','description','image_path','can_view','can_upload','can_download','can_comment'
    ];
}
