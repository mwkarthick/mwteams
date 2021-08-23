<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\UserModel;

class TargetPurchaseModel extends BaseModel {
    
    public $table = 'target_purchase';
    // 	id	name	address	created_by	status	create_date	update_date
    protected $fillable = array('id','team_id','team_code','startdate','enddate','created_by_id','status','created_at','updated_at');
    protected $selectable = array('target_purchase.id','target_purchase.team_id','target_purchase.team_code', 'target_purchase.startdate','target_purchase.enddate',
        'target_purchase.created_by_id','target_purchase.status','target_purchase.created_at','target_purchase.updated_at');
    
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
