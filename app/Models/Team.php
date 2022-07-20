<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mpociot\Teamwork\TeamworkTeam;
use App\Models\Project;



class Team extends TeamworkTeam
{	
	public function getTeamProject(){
	        return $this->belongsToMany(Project::class, 'team_projects' );
	}
}
