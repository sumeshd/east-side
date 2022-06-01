<?php

namespace App\Models;

use App\Models\Project;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['project_id','user_id','comment_body'];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id','id');
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id','id');
    }
}
