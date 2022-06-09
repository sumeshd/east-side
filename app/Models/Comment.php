<?php

namespace App\Models;

use App\Models\Settings_presales;
use App\Models\Settings_postsales;
use App\Models\Settings_execution;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['presalesid','postsalesid','executionid','user_id','comment_body'];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id','id');
    }
    
    public function presales()
    {
        return $this->belongsTo(Settings_presales::class, 'presalesid','id');
    }


    // public function settings_postsales()
    // {
    //     return $this->belongsTo(Settings_postsales::class, 'postsalesid','id');
    // }


    // public function settings_execution()
    // {
    //     return $this->belongsTo(Settings_execution::class, 'execution','id');
    // }
}
