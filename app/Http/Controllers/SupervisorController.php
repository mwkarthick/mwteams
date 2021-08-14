<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;


use App\Models\SupervisorModel;


class SupervisorController extends Controller
{
    public $modelName       = 'App\Models\SupervisorModel';
    public $baseRedirect    = 'supervisors.index';
    public $baseName        = 'supervisors';
    public $basePath        = 'supervisors/';
    public $detailName   = 'supervisorController@getIndex';
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
         $status = 1;
        $message = "success";
       
        $inputs = $request->all();        
        
        if($this->created_by)
        {
            $inputs['created_by_id'] = session()->get('user_id');
        }        
        $model = new $this->modelName();
        $modeldata = $model->where('name', 'LIKE', $inputs['name'])->first() ;
        if($modeldata) 
        {
            return redirect()->back()->with(['error' => 'Name Duplicated with others!'])->withInput();
        }        
        $stored = $model->addRecord($inputs);        
        if($stored && is_array($stored))
        {
            return redirect()->back()->withErrors($stored)->withInput();
        }
        //return redirect()->route($this->baseName.'.show',$model->id);
        return redirect()->route($this->baseRedirect);              
    }
    
    public function update(Request $request, $id)
    {
        $status = 1;
        $message = "success";
        if( !isset($id) ||  (!($id > 0)) )
        {
            return redirect()->route($this->baseRedirect);    
        }
        
        $inputs = $request->all();
        $model = new $this->modelName();
        $modelData = $model->find($id);
        if(!$modelData)
        {
            return redirect()->route($this->baseRedirect);   
        }
        $saved = $modelData->updateData($inputs);
        if($saved && is_array($saved))
        {
            return redirect()->back()->withErrors($saved)->withInput();
        }
        return redirect()->route($this->baseRedirect);

    }
    
}
