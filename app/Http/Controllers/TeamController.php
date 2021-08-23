<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;


use App\Models\TeamModel;
use App\Models\SupervisorModel;
use App\Models\TeamSupervisorModel;

class TeamController extends Controller
{
    public $modelName       = 'App\Models\TeamModel';
    public $modelSvisorName = 'App\Models\SupervisorModel';
    public $modelTmSvisorName = 'App\Models\TeamSupervisorModel';
    public $baseRedirect    = 'teams.index';
    public $baseName        = 'teams';
    public $basePath        = 'teams/';
    public $detailName   = 'teamController@getIndex';
    
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
    public function show($id)
    {        
        $model = new $this->modelName();
        $record = $model->find($id);
        if(!$record)
        {
            return redirect()->route($this->baseRedirect);    
        } 

        $this->data['record'] = $record;
        $this->data['baseName'] = $this->baseName;
        $this->data['basePath'] = $this->basePath;
        return view($this->basePath . $this->baseName . '_detail', $this->data); 
    }    
    public function addsupervisor($id)
    {
        $model = new $this->modelName();
        $modelData = $model->find($id);
        $tsvdata2=array();
                
        $modeltms = new TeamSupervisorModel();
        $tsvdata = $modeltms->where('team_id',$id)->select('supervisor_id')->get();
        foreach($tsvdata as $tsvd)
        {
            $tsvdata2[]=$tsvd->supervisor_id;
        }
        $modalsvsr = new SupervisorModel();        
        $svdata = $modalsvsr->all();
        
        $data['modeName'] = "Add";
        $data['tsvdata'] = $tsvdata2;        
        $data['svdata'] = $svdata;        
        $data['moduleName'] = $this->baseName;
        $data['modelData'] = $modelData;
        
        return view($this->basePath . $this->baseName . '_addsupervisor', $data); 

    }                
    public function storeSupervisor(Request $request)
    {
        $input = $request->all();

        $model = new $this->modelName();
        $modeltmData = $model->find($input['team_id']);
        
        $modalsvsr = new SupervisorModel();
        $modelsvData = $modalsvsr->find($input['supervisor_id']);
        
        $input['team_code'] = $modeltmData->code;        
        $input['supervisor_code'] = $modelsvData->code;
        $input['created_by_id'] = session()->get('user_id');
        $input['status'] = 1;
        
        $modeltms = new TeamSupervisorModel();
        $stored = $modeltms->addRecord($input);        
        if($stored && is_array($stored))
        {
            return redirect()->back()->withErrors($stored)->withInput();
        }
        return redirect()->route($this->baseName.'.show',$input['team_id']);
    }
}
