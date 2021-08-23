<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\UserModel;


class TeamModel extends BaseModel {
    
    public $table = 'teams';
    // 	id	name	address	created_by	status	create_date	update_date
    protected $fillable = array('id','name','code','created_by_id','status','created_at','updated_at');
    protected $selectable = array('teams.id','teams.name','teams.code','teams.created_by_id','teams.status','teams.created_at','teams.updated_at');
    
    public function __construct()
    {
        parent::__construct();

    } 
    public function usr()
    {
        return $this->hasOne('App\Models\UserModel','id','created_by_id');
    }
    public function supervisorslist()
    {
        return $this->hasMany('App\Models\TeamSupervisorModel','team_id','id');
    }
}
