<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Libraries\Helpers\SmsHelper;


class HomeController extends Controller
{
    
    public $modelUser       = 'App\Models\UserModel';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*Auth::logout();
        session()->flush();*/
        $this->middleware('auth');
        
        
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        
        
        return view('home');
    }
    
    public function getIndex()
    {
        return $this->index();
    }
    
    
}
