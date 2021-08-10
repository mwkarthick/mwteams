<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

use App\TokenStore\TokenCache;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Illuminate\Http\Request as Request2;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    public $modelName       = 'App\Models\UserModel';

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function getLogin()
    {
        return view('auth.login');
    }
    
    public function postLogin()
    {
        $inputs = Request::all();
        $user=$inputs['user'];
        $pass=base64_encode($inputs['pass']);
        $token=$inputs['_token'];
        $model = new $this->modelName();
		$modelData = $model->where('username',$user)
							->where('password',$pass)->first();

		if($modelData)
		{
			Session::put('name', $modelData->name);
			Session::put('user_id', $modelData->id);
			Session::put('token', $token );
			Session::put('user_type', $modelData->user_type );
			
				
			//echo $String;
			return redirect()->to('home')->with('Success','Welcome!');
			
		}
		else
		{
			//print_r($logindata);
			return redirect()->guest(url('login'))->with('error','Incorrect Username and Password!');
		} 
            
    }
    
    
    
    public function logout() {
        session()->flush();
        Auth::logout();
        return response()->json();
        //return Redirect('login');
    }
    
   
}
