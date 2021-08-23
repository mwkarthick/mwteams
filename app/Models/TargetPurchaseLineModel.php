<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\UserModel;

class TargetPurchaseLineModel extends BaseModel {
    
    public $table = 'target_purchase_line';
    // 	id	name	address	created_by	status	create_date	update_date
    protected $fillable = array('id','target_purchase_id','product_code','product_name','target_value','created_by_id','status','created_at','updated_at');
    protected $selectable = array('target_purchase_line.id','target_purchase_line.target_purchase_id','target_purchase_line.product_code', 'target_purchase_line.product_name','target_purchase_line.target_value',
        'target_purchase_line.created_by_id','target_purchase_line.status','target_purchase_line.created_at','target_purchase_line.updated_at');
    
    public function __construct()
    {
        parent::__construct();
    } 
    public function usr()
    {
        return $this->hasOne('App\Models\UserModel','id','created_by_id');
    }
    public function targetpurchase()
    {
        return $this->belongsTo('App\Models\TargetPurchaseModel','target_purchase_id','id');
    }
    
}
