<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\UserModel;

class TeamTargetModel extends BaseModel {
    
    public $table = 'team_target';
    // 	id	name	address	created_by	status	create_date	update_date
    protected $fillable = array('id','team_id','team_code','startdate','enddate','target_value','created_by_id','status','created_at','updated_at');
    protected $selectable = array('team_target.id','team_target.team_id','team_target.team_code', 'team_target.startdate','team_target.enddate','team_target.target_value',
        'team_target.created_by_id','team_target.status','team_target.created_at','team_target.updated_at');
    
    public function __construct()
    {
        parent::__construct();
    } 
    public function usr()
    {
        return $this->hasOne('App\Models\UserModel','id','created_by_id');
    }
    public function team()
    {
        return $this->belongsTo('App\Models\TeamModel','team_id','id');
    }
    
}
