<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\UserModel;

class TargetProductionLineModel extends BaseModel {
    
    public $table = 'target_production_line';
    // 	id	name	address	created_by	status	create_date	update_date
    protected $fillable = array('id','target_production_id','product_code','product_name','target_value','created_by_id','status','created_at','updated_at');
    protected $selectable = array('target_production_line.id','target_production_line.target_production_id','target_production_line.product_code', 'target_production_line.product_name','target_production_line.target_value',
        'target_production_line.created_by_id','target_production_line.status','target_production_line.created_at','target_production_line.updated_at');
    
    public function __construct()
    {
        parent::__construct();
    } 
    public function usr()
    {
        return $this->hasOne('App\Models\UserModel','id','created_by_id');
    }
    public function targetproduction()
    {
        return $this->belongsTo('App\Models\TargetProductionModel','target_production_id','id');
    }
    
}
