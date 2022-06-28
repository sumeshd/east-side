<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable=[
        'type','parent_id','check_id','name','description','image_path','can_view','can_upload','can_download','can_comment'
    ];
}
