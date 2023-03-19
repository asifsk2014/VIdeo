<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\frontend\RegisterAuthModel;
use Illuminate\Support\Facades\Redirect ;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\URL;
use App\Image;
use Stroage;



class CategoryController extends Controller
{
    public function category()
    {
    	return view('admin.category.addcategory');
    }

    public function category_post(Request $request)
    {
    	
    	// $add_category=$request->category;
        // $add_sub_id=$request->sub_id;
        
        //  $category_model= new RegisterAuthModel;
        //  $category_model->category_name=$add_category;
        //  $category_model->sub_id=$add_sub_id;           
        //  $category_model->save();             
        //  Session::flash('message', 'Thank you for your Post');

        //  return redirect::back();
       
        

    	// Session::flash( 'message', 'Successfully Category Create');

    	// return redirect::back();
    }

    public function all_category()
    {
    
        $all_data=RegisterAuthModel::all();
       	//dd($all_data) ;die();
    	return view('admin.category.all_category')->with('all_data', $all_data);
    }  

    public function delete($id)
    {

      $image=CategoryModel::where('news_id','=', $id)->get()->toArray()[0]["image"];
                   $url = base_path()."/public/uploads/".$image;
           chmod($url,0777);
           unlink($url);

            CategoryModel::where('news_id', '=' , $id)->delete();
            return Redirect::back();
    }
    
    public function edit_page($id)
    {

    	$all_data=CategoryModel::where('ID','=', $id)->first();
    	return view('admin.category.edit_category')->with('data' , $all_data);
    }
    
    public function update(Request $request)
    {
    	$add_category=$request->category;
    	
    	$data['category_name']=$add_category;
    	
    	 CategoryModel::where('ID','=', $request->ID)->update($data);           
         Session::flash('message', 'Thank you for your Update');

         return redirect::to('admin/all_category')->send(); 
    	
    	
    
    }
    public function updateStatus($id)
    {
       	

    	$status='confirm';
    	$data['status']=$status;
    	
        RegisterAuthModel::where('ID','=', $id)->update($data);           
         Session::flash('message', 'Thank you for your Update');

         return redirect::to('admin/all_category')->send(); 
    	
    	
    
    }
    public function updateStatusReject($id)
    {
    	$status='failed';
    	$data['status']=$status;
    	
        RegisterAuthModel::where('ID','=', $id)->update($data);           
         Session::flash('message', 'Thank you for your Update');

         return redirect::to('admin/all_category')->send(); 
    	
    	
    
    }
    public function deleteUser($id)
    {
        	
        RegisterAuthModel::where('ID','=', $id)->delete();   

         Session::flash('message', 'Thank you for your Update');

         return redirect::to('admin/all_category')->send(); 
    	
    	
    
    }
    
    
    
    
}
