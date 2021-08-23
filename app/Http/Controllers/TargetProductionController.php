<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use App\Models\TargetProductionModel;
use App\Models\TargetProductionLineModel;


class TargetProductionController extends Controller {

    public $modelName = 'App\Models\TargetProductionModel';
    public $modelLineName = 'App\Models\TargetProductionLineModel';
    public $modelTeamName = 'App\Models\TeamModel';
    public $baseRedirect = 'targetproduction.index';
    public $baseName = 'targetproduction';
    public $basePath = 'targetproduction/';
    public $detailName = 'TargetProductionController@getIndex';

    public function __construct() {
        $this->middleware('auth');
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
        $preteamlog=array();
        $cnt=count($inputs['team_code']);
        for($i=1;$i<$cnt;$i++)
        {   $k=0;
            $modelteam = new $this->modelTeamName();
            $model = new $this->modelName();
            $modelline = new $this->modelLineName();
            
            $modelData = $modelteam->where('code',$inputs['team_code'][$i])->first();
            if($modelData)
            {
                
                $modelProduction = $model->where('team_code',$inputs['team_code'][$i])
                                ->where('startdate','=',$inputs['startdate'])
                                ->where('enddate','=',$inputs['enddate'])->first();
                
                if($modelProduction)
                {
                        $inp['target_production_id']= $modelProduction->id;
                        $inp['product_code']= $inputs['product_code'][$i];
                        $inp['product_name']= $inputs['product_name'][$i];
                        $inp['target_value']= $inputs['target_value'][$i];
                        $inp['created_by_id']= session()->get('user_id');
                        $inp['status']= 1;
                        $storedline = $modelline->addRecord($inp);
                        if ($storedline && is_array($storedline)) {
                            $storelog[]="error line";
                        } 
                }
                else
                {
                    $modelProduction2 = $model->where('team_code',$inputs['team_code'][$i])
                                ->where('enddate','>',$inputs['startdate'])->get();
                    
                    if(is_array($modelProduction2))
                    {
                        
                        foreach($modelProduction2 as $modelPro)
                        {
                            $preteamlog[]="Start Date Should be Greater than Exisiting End date";

                        }
                    }
                    else
                    {
                        $inp['team_id']= $modelData->id;
                        $inp['team_code']= $inputs['team_code'][$i];
                        $inp['startdate']= $inputs['startdate'];
                        $inp['enddate']= $inputs['enddate'];
                        $inp['created_by_id']= session()->get('user_id');
                        $inp['status']= 1;
                        
                        $stored = $model->addRecord($inp);
                        if ($stored && is_array($stored)) {
                            $storelog[]="error";
                        }
                        else
                        {
                            $inp['target_production_id']= $model->id;
                            $inp['product_code']= $inputs['product_code'][$i];
                            $inp['product_name']= $inputs['product_name'][$i];
                            $inp['target_value']= $inputs['target_value'][$i];
                            $inp['created_by_id']= session()->get('user_id');
                            $inp['status']= 1;
                            $storedline = $modelline->addRecord($inp);
                            if ($storedline && is_array($storedline)) {
                                $storelog[]="error line";
                            }
                        }
                    }
                    
                }

                    
            }
            else
            {
                $errorlog[]=$inputs['team_code'][$i];
            }
            
            
                
        }
        
        $this->data['status']=1;
        $this->data['errorlog']=$errorlog;
        $this->data['teamlog']=$preteamlog;
        $this->data['message']="Upload Success";
        return response()->json($this->data);
    }

}
