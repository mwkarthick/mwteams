<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use App\Models\TeamModel;

class TeamTargetController extends Controller {

    public $modelName = 'App\Models\TeamTargetModel';
    public $modelTeamName = 'App\Models\TeamModel';
    public $baseRedirect = 'teamtarget.index';
    public $baseName = 'teamtarget';
    public $basePath = 'teamtarget/';
    public $detailName = 'TeamTargetController@getIndex';

    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request) {
        $status = 1;
        $message = "success";

        $inputs = $request->all();

        if ($this->created_by) {
            $inputs['created_by_id'] = session()->get('user_id');
        }
        $model = new $this->modelName();
        $modeldata = $model->where('name', 'LIKE', $inputs['name'])->first();
        if ($modeldata) {
            return redirect()->back()->with(['error' => 'Name Duplicated with others!'])->withInput();
        }
        $stored = $model->addRecord($inputs);
        if ($stored && is_array($stored)) {
            return redirect()->back()->withErrors($stored)->withInput();
        }
        //return redirect()->route($this->baseName.'.show',$model->id);
        return redirect()->route($this->baseRedirect);
    }

    public function update(Request $request, $id) {
        $status = 1;
        $message = "success";
        if (!isset($id) || (!($id > 0))) {
            return redirect()->route($this->baseRedirect);
        }

        $inputs = $request->all();
        $model = new $this->modelName();
        $modelData = $model->find($id);
        if (!$modelData) {
            return redirect()->route($this->baseRedirect);
        }
        $saved = $modelData->updateData($inputs);
        if ($saved && is_array($saved)) {
            return redirect()->back()->withErrors($saved)->withInput();
        }
        return redirect()->route($this->baseRedirect);
    }

    public function readcsv(Request $request) {
        $inputs = $request->all();
        //print_r($inputs);die;
        if (isset($_FILES["csvfile"])) {

            //if there was an error uploading the file
            if ($_FILES["csvfile"]["error"] > 0) {
                $this->data['status']=0;
                $this->data['message']="Return Code: " . $_FILES["csvfile"]["error"];
                return response()->json($this->data); 
            } else {

                $baseroot_url = 'static/uploads/';
                $baseroot_uploadpath = public_path($baseroot_url);
                if (file_exists($baseroot_uploadpath . $_FILES["csvfile"]["name"])) {
                    unlink($baseroot_uploadpath . $_FILES["csvfile"]["name"]);
                    $storagename = $_FILES["csvfile"]["name"];
                    move_uploaded_file($_FILES["csvfile"]["tmp_name"], $baseroot_uploadpath . $storagename);
                    
                    
                } else {
                    $storagename = $_FILES["csvfile"]["name"];
                    move_uploaded_file($_FILES["csvfile"]["tmp_name"], $baseroot_uploadpath . $storagename);
                }
                $row = 0;
                $td=array();
                if (($handle = fopen($baseroot_uploadpath . $storagename, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($c = 0; $c < $num; $c++) {
                               $td[$row][$c]=$data[$c];;
                        }
                        $row++;
                    }
                    fclose($handle);
                }
                $this->data['status']=1;
                $this->data['td_data']=$td;
                $this->data['message']="Upload Success";
                return response()->json($this->data); 
            }
        } else {
            $this->data['status']=0;
            $this->data['message']="No file selected";
            return response()->json($this->data); 
        }
    }
    
    public function uploadcsv(Request $request) {
        $inputs = $request->all();
        $errorlog=array();
        $cnt=count($inputs['team_code']);
        for($i=1;$i<$cnt;$i++)
        {   $k=0;
            $modelteam = new $this->modelTeamName();
            $modelData = $modelteam->where('code',$inputs['team_code'][$i])->first();
            if($modelData)
            {
                $model = new $this->modelName();
                
                $inp['team_id']= $modelData->id;
                $inp['team_code']= $inputs['team_code'][$i];
                $inp['target_value']= $inputs['target_value'][$i];
                $inp['startdate']= $inputs['startdate'];
                $inp['enddate']= $inputs['enddate'];
                $inp['created_by_id']= session()->get('user_id');
                $inp['status']= 1;
                
                //print_r($inp);
                $stored = $model->addRecord($inp);
                if ($stored && is_array($stored)) {
                    return redirect()->back()->withErrors($stored)->withInput();
                }
            }
            else
            {
                $errorlog[]=$inputs['team_code'][$i];
                $k++;
            }
            
            
                
        }
        
        $this->data['status']=1;
        $this->data['errorlog']=$errorlog;
        $this->data['message']="Upload Success";
        return response()->json($this->data);
    }

}
