<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect ;
use Illuminate\Support\Facades\Session ;

class PagesController extends Controller
{
    

     public function home()
    {

    	   $check_session = Session::get('username');

    	   if($check_session == 0)
    	   {
              
               return Redirect::to('public/admin/login');

    	   }
    	 return view('admin.pages.index');
	}
}
