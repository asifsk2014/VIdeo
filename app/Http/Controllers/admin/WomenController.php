<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\WomenModel;
use Illuminate\Support\Facades\Redirect ;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Image;
use Stroage;


class WomenController extends Controller
{
    public function add_news()
    {
    	return view('admin.we_the_women.add_news');
    }
    public function women_post_news(Request $request)

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
             $destinationPath = URL::to('/').'/public/uploads/women/';                              
             $actual_path = base_path().'/public/uploads/women/';   
             $file->move($actual_path, $a_file);  
        
               $news_model= new WomenModel;
               $news_model->news_title=$add_title;
               $news_model->news_description=$add_description;
               $news_model->update_date=$add_date;
               $news_model->image=$a_file;
               $news_model->save();             
               Session::flash('message', 'Succesfully  News');

              return redirect::back();
       
          }

    } 

    public function list_news()
    {

    	$all_data=WomenModel::all();
    	return view('admin.we_the_women.all_news')->with('all_data' , $all_data);
    }

      public function delete_news($id)
    {
    	$image=WomenModel::where('news_id','=', $id)->get()->toArray()[0]["image"];
                   $url = base_path()."/public/uploads/women/".$image;
           chmod($url,0777);
           unlink($url);

            WomenModel::where('news_id', '=' , $id)->delete();
            return Redirect::back();
    }

     public function edit_page($id)
    {

    	$all_data=WomenModel::where('news_id','=', $id)->first();
    	return view('admin.we_the_women.edit_news')->with('data' , $all_data);
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
             $destinationPath = URL::to('/').'/public/uploads/women/';                              
             $actual_path = base_path().'/public/uploads/women/';   
             $file->move($actual_path, $a_file);  
             $update_model["image"]=$a_file;
        }
        else {           
        
                
               $update_model["news_title"]=$add_title;
               $update_model["news_description"]=$add_description;
               $update_model["update_date"]=$add_date;
            
                   
          }
          //echo "<pre>";
        //print_r ($update_model);exit;
               WomenModel::where('news_id','=', $request->ID)->update($update_model);           
               Session::flash('message', 'Successfully Update');

              return redirect::to('admin/list/women_news')->send(); 
    }
}
