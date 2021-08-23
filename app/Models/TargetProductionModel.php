<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\UserModel;

class TargetProductionModel extends BaseModel {
    
    public $table = 'target_production';
    // 	id	name	address	created_by	status	create_date	update_date
    protected $fillable = array('id','team_id','team_code','startdate','enddate','created_by_id','status','created_at','updated_at');
    protected $selectable = array('target_production.id','target_production.team_id','target_production.team_code', 'target_production.startdate','target_production.enddate',
        'target_production.created_by_id','target_production.status','target_production.created_at','target_production.updated_at');
    
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
