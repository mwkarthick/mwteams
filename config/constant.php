<?php

return [
	// file upload public path
    'UPLOAD_PATH_URL'                               => "static/uploads/",
    'UPLOAD_PATH_USERS_URL'                         => "static/uploads/users/",
    'UPLOAD_PATH_MEMBERS_URL'                       => "static/uploads/members/",
    'UPLOAD_PATH_CUSTOMERS_URL'                     => "static/uploads/customers/",
    'UPLOAD_PATH_POSTURALANALYSIS_URL'              => "static/uploads/postural_analysis/",   
    'UPLOAD_PATH_CORPORATES_URL'                    => "static/uploads/corporates/",
    'UPLOAD_PATH_EXERCISES_URL'                     => "static/uploads/exercises/", 
    'UPLOAD_PATH_WORKOUTS_URL'                      => "static/uploads/workouts/",  
    'UPLOAD_PATH_SUMMERNOTE_QUESTIONAIRES_URL'      => "static/uploads/summernotes/questionaires/", 
    'UPLOAD_PATH_SUMMERNOTE_TEMPLATES_URL'          => "static/uploads/summernotes/templates/",  
    'UPLOAD_PATH_SUMMERNOTE_MESSAGETPL_URL'         => "static/uploads/summernotes/message/",    
    'UPLOAD_PATH_CATEGORY_URL'                      => "static/uploads/category/",   
    'UPLOAD_PATH_REPORT_URL'                        => "reports/template",
    'UPLOAD_PATH_RESULT_URL'                        => "reports/result",
    'UPLOAD_PATH_EQUIPMENT_URL'                     => "static/uploads/equipment/equipassets/",   
    'UPLOAD_PATH_EQUIPMENTSERVICE_URL'              => "static/uploads/equipmentservice/",
    'UPLOAD_PATH_EQUIPMENTBRANCH_URL'               => "static/uploads/equipment/branchwise/",
    'UPLOAD_PATH_INVOICEASSET_URL'                  => "static/uploads/invoice/invoiceassets/",
     'UPLOAD_PATH_BRANCHAUDIT_URL'                  => "static/uploads/branchaudit/",
     'UPLOAD_PATH_BRANCHDOCS_URL'                   => "static/uploads/branchdocs/",
    
    'ADMINID'=>"admin@megawin.co.in",
    'adminpassword'=>"W3lc0m3@adm!n",
    'spareid'=>"admin@megawin.co.in",
    'sparepassword'=>"W3lc0m3@adm!n",
    'serviceid'=>"admin@megawin.co.in",
    'servicepassword'=>"W3lc0m3@adm!n",
    

    'DATE_FORMAT' => "d/m/Y",
    'TIME_FORMAT' => "h:i A",    
    'DATE_SINCE' => "M Y",    
    'DATE_START' => "d/M",  
    'DATE_STARTIME' => "d M h:i A",
    'DATE_TIME_FORMAT' => "d/m/Y h:i A",
    
    'MODEL_FIELDS' => [
        
        'App\User'                              => ["users.email","users.fullname"],
        
    ],
    
    
    
    'DEVICE_TYPE_ID'=>[
        'browser'=>0,
        'android'=>1,
        'ios'=>2,
        'windows'=>3,
        'blackberry'=>4,
        'mac'=>5,
        'tizen'=>6,
        'unknown'=>99
    ],
    
    'API_REQUEST_DATA'=>[
        
        'sms-url'=>"http://smshorizon.co.in/api/sendsms.php",
        'sms-apiKey'=>"m7DxLCcqdbBX47bXQkOk",
        'sms-user'=>"Megawin",
        'sms-senderid'=>"MEGAWN",  
        'sms-cType'=>"txt",
        
    ],
    
    'OPENBRAVOIP'     => "http://192.168.0.211:8080/megawin/",
    
    
];