<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\LifestyleModel;

use Illuminate\Support\Facades\Redirect ;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

use App\Image;
use Stroage;

class LifestyleController extends Controller
{
     public function add_news()
    {
    	return view('admin.lifestyle.add_news');
    }
    public function post_news(Request $request)

    {
    	$add_title=$request->title;
    	$add_description=$request->content;
    	$add_date=$request->news_date;
    	$file = $request->file("a_file");
        $destinationPath = "";
        $a_file= "";
        
      $this->validate($request,[
      'a_file' => 'required|image:jpeg,png,jpg,'
                       ]);
         if(count($file)>0 )
        {        
             $imgnam =  md5(date('d-m-Y').time());
             $a_file = $imgnam.".".$file->getClientOriginalExtension();                  
             $destinationPath = URL::to('/').'/public/uploads/';                              
             $actual_path = base_path().'/public/uploads/';   
             $file->move($actual_path, $a_file);  
        
               $news_model= new LifestyleModel;
               $news_model->news_title=$add_title;
               $news_model->news_description=$add_description;
               $news_model->update_date=$add_date;
               $news_model->image=$a_file;
               $news_model->save();             
               Session::flash('message', 'Thank you for your Post');

              return redirect::back();
       
          }

    } 

   public function list_news()
    {

    	$all_data=LifestyleModel::all();
    	return view('admin.lifestyle.all_news')->with('all_data' , $all_data);
    }

      public function delete_news($id)
    {
    	$image=LifestyleModel::where('news_id','=', $id)->get()->toArray()[0]["image"];
                   $url = base_path()."/public/uploads/".$image;
           chmod($url,0777);
           unlink($url);

            LifestyleModel::where('news_id', '=' , $id)->delete();
            return Redirect::back();
    }

      public function edit_page($id)
    {

    	$all_data=LifestyleModel::where('news_id','=', $id)->first();
    	return view('admin.lifestyle.edit_news')->with('data' , $all_data);
    }

    public function post_update(Request $request)
    {
    	$add_title=$request->title;
    	$add_description=$request->content;
    	$add_date=$request->news_date;
    	$file = $request->file("a_file");
        $destinationPath = "";
        $a_file= "";
      
      
      $update_model = array();    
      if(count($file)>0 )
        {    
            $this->validate($request,[
         'a_file' => 'required|image:jpeg,png,jpg,'
                       ]);    
             $imgnam =  md5(date('d-m-Y').time());
             $a_file = $imgnam.".".$file->getClientOriginalExtension();                  
             $destinationPath = URL::to('/').'/public/uploads/';                              
             $actual_path = base_path().'/public/uploads/';   
             $file->move($actual_path, $a_file);  
             $update_model["image"]=$a_file;
        }
        else {           
        
                
               $update_model["news_title"]=$add_title;
               $update_model["news_description"]=$add_description;
               $update_model["update_date"]=$add_date;
            
                   
          }
         // echo "<pre>";
          //print_r ($update_model);exit;
               LifestyleModel::where('news_id','=', $request->ID)->update($update_model);           
               Session::flash('message', 'Successfully Update');

              return redirect::to('admin/list/lifestyle_news')->send(); 
    }

}
