<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\LoginModel;
use Illuminate\Support\Facades\Redirect ;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\DB ;
class LoginController extends Controller
{
    public function index()
	{
    	return view('admin.login');
	}
	public function login_post(Request $request)
	{

		$username=$request->username;
		$userpassword=$request->password;
		$check_session=Session::get('user_name');
		$check_val=LoginModel::where('user_name','=',$username)->where('user_password','=',$userpassword)->first();
		//count(array($variable));
		//dd($check_val) ;die();

	//	echo "<pre>";
		//print_r($check_val);

		if($check_val)
		{
			Session::put('username',1);
			return redirect::to('admin/home')->send();
		}

		else{
			Session::put('username',0);
			Session::flash('message', 'Invalid Password ! Try Again');
			return redirect::to('admin/login')->send();
			}
		}

    public function edit_page()
    {

    return view('admin.admin.change_password');

    }

    public function change_password(Request $request)
    {

    	$old_password=md5($request->old_password);
		$check_old_password=LoginModel::where('user_password','=',$old_password)->count();

		if($check_old_password>0)
		{
			$userpasword=md5($request->password);
			$confirmpassword=md5($request->confirm_password);
			if($userpasword !== $confirmpassword)
			{
				Session::flash('error_passwrd_message','Sorry! Password and Confirm Password does"nt match');
				return redirect::to('admin/user_edit')->send();
			}
			$data['user_password']=$userpasword;

			LoginModel::where('ID' ,'=' ,1)->update($data);
			Session::flash('message' ,'Password Successfully Changed ');
			return redirect::to('admin/user_edit')->send();
		}else
		{
			Session::flash('error_old','Old Password Doesn"t  Match');
			return redirect::to('admin/user_edit')->send();
		}


    }

	public function do_logout(){

        Session::put('username', '');

        return Redirect::to('admin/login');



    }
}
