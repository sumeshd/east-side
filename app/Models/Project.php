<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Project extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','project_type','projectname','projectnumber','address_1','address_2','address_3','pin'
    ];


    public function customers(){
        return $this->belongsToMany(Customer::class);
    }
}
