<?php

namespace App\Models;
use App\Models\BaseModel;
use App\Models\UserModel;

class TeamSupervisorModel extends BaseModel {
    
    public $table = 'team_supervisors';

    //id name address	created_by status create_date update_date
    protected $fillable = array('id','team_id','supervisor_id','team_code','supervisor_code','created_by_id','status','created_at','updated_at');
    protected $selectable = array('team_supervisors.id','team_supervisors.team_Id','team_supervisors.supervisor_id',
        'team_supervisors.team_code', 'team_supervisors.supervisor_code',
        'team_supervisors.created_by_id','team_supervisors.status','team_supervisors.created_at','team_supervisors.updated_at');
    
    public function __construct()
    {
        parent::__construct();
    } 
    public function usr()
    {
        return $this->hasOne('App\Models\UserModel','id','created_by_id');
    }    
    public function supervisor()
    {
        return $this->belongsTo('App\Models\SupervisorModel','supervisor_id','id');
    }
}
