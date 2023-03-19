<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\SubcategoryModel;
use App\frontend\CategoryModel;
use Illuminate\Support\Facades\Redirect ;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Image;
use Stroage;

class SubcatgoryController extends Controller
{


	public function add_sub_category()
    {
    	$all_category=CategoryModel::all();
    	return view('admin.sub_category.addsub_category')->with('all_category' , $all_category);
    }

  public function post_subcategory(Request $request)
    {
    	
        $add_sub_id=$request->subcategory_id;
        $add_title=$request->title;
        $add_description=$request->content;
        $add_date=$request->update_date;
        $file = $request->file("a_file");
        $destinationPath = "";
        $a_file= "";

        $this->validate($request,[
      'a_file' => 'required|image:jpeg,png,jpg,'
                       ]);
         if(count(array($file))>0 )
        {        
             $imgnam =  md5(date('d-m-Y').time());
             $a_file = $imgnam.".".$file->getClientOriginalExtension();                  
             $destinationPath = URL::to('/').'/public/uploads/subcategory';                              
             $actual_path = base_path().'/public/uploads/subcategory';   
             $file->move($actual_path, $a_file);  
        
              $category_model= new SubcategoryModel;
              $category_model->subcategory_id=$add_sub_id;
              $category_model->news_title=$add_title;
              $category_model->news_description=$add_description;
              $category_model->update_date=$add_date;
              $category_model->image=$a_file;
              $category_model->save();   
              
                //echo "<pre>";
       // print_r ($category_model);exit;          
               Session::flash('message', 'Thank you for your Post');

              return redirect::back();
       
          }
    }

    public function all_subcategory()
    {
    
    	$all_data=SubcategoryModel::all();
    	return view('admin.sub_category.all_subcategory')->with('all_data', $all_data);
    }  

    public function delete($id)
    {

      $image=SubcategoryModel::where('ID','=', $id)->get()->toArray()[0]["image"];
                   $url = base_path()."/public/uploads/subcategory/".$image;
           chmod($url,0777);
           unlink($url);

            SubcategoryModel::where('ID', '=' , $id)->delete();
            return Redirect::back();
    }
    
    public function edit_page($id)
    {
	$all_category=CategoryModel::all();
    	$all_data=SubcategoryModel::where('ID','=', $id)->first();
    	return view('admin.sub_category.edit_subcategory')->with('data' , $all_data)->with('all_category',$all_category);
    }
    
    public function update(Request $request)
    {
    
        $add_sub_id=$request->subcategory_id;
        $add_title=$request->title;
        $add_description=$request->content;
        $add_date=$request->update_date;
        $file = $request->file("a_file");
        $destinationPath = "";
        $a_file= "";

      
      
      $update_model = array();    
      if(count(array($file))>0 )
        {    
            $this->validate($request,[
         'a_file' => 'required|image:jpeg,png,jpg,'
                       ]);    
             $imgnam =  md5(date('d-m-Y').time());
             $a_file = $imgnam.".".$file->getClientOriginalExtension();                  
             $destinationPath = URL::to('/').'/public/uploads/subcategory/';                              
             $actual_path = base_path().'/public/uploads/subcategory/';   
             $file->move($actual_path, $a_file);  
             $update_model["image"]=$a_file;
        }
        else {           
        
               $update_model["subcategory_id"]=$add_sub_id;
               $update_model["news_title"]=$add_title;
               $update_model["news_description"]=$add_description;
               $update_model["update_date"]=$add_date;
            
                   
          }
         // echo "<pre>";
          //print_r ($update_model);exit;
               SubcategoryModel::where('ID','=', $request->ID)->update($update_model);           
               Session::flash('message', 'Successfully Update');

              return redirect::to('admin/list/sub_category')->send(); 
    }
    
    
}
