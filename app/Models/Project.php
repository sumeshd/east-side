<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
//use App\Models\Project;
use App\Models\Pcomment;
use App\Models\User;

class Project extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','project_type','settings_name','projectname','projectnumber','address_1','address_2','address_3','pin','customer_id'
    ];


    public function customers(){
        return $this->belongsToMany(Customer::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }


   
}
