<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use Carbon\Carbon;
use App\Models\Comment;

class Task extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id','project_settings_id','assigned_by','task_name','task_description','task_assing_on','task_duedate','completed_on','status','task_comment'
    ];

    //protected $dates = ['task_duedate'];

    public function getComments(){
        return $this->hasMany(Comment::class);
    }
 
}
