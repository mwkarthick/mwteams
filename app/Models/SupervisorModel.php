<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\UserModel;


class SupervisorModel extends BaseModel {
    
    public $table = 'supervisors';
    // 	id	name	address	created_by	status	create_date	update_date
    protected $fillable = array('id','name','code','created_by_id','status','created_at','updated_at');
    protected $selectable = array('supervisors.id','supervisors.name','supervisors.code','supervisors.created_by_id','supervisors.status','supervisors.created_at','supervisors.updated_at');
    
    public function __construct()
    {
        parent::__construct();

    } 
    public function usr()
    {
        return $this->hasOne('App\Models\UserModel','id','created_by_id');
    }
    
    
}
