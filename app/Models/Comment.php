<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Presales;
use App\Models\Postsales;
use App\Models\Execution;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'presales_id','postsales_id','execution_id','user_id','comment_body'
    ];


    public function presales(){
        return $this->belongsTo(Presales::class,'presales_id','id');
    }

    public function postsales(){
        return $this->belongsTo(Postsales::class,'postsales_id','id');
    }

    public function execution(){
        return $this->belongsTo(Execution::class,'execution_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
