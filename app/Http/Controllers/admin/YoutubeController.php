<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\admin\YoutubeModel;
use Illuminate\Support\Facades\Redirect ;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class YoutubeController extends Controller
{
     public function add_link()
    {
    	return view('admin.youtube_link.add_news');
    }
    public function post_link(Request $request)

    {
    	$add_title=$request->title;
    	$add_link=$request->link;
    	$add_date=$request->update_date;
    	       
            
               $news_model= new YoutubeModel;
               $news_model->title=$add_title;
               $news_model->link=$add_link;
               $news_model->update_date=$add_date;
               
               $news_model->save();             
               Session::flash('message', 'Thank you for your Post');

              return redirect::back();
       
          

    } 

    public function list_news()
    {

    	$all_data=YoutubeModel::all();
    	return view('admin.youtube_link.all_news')->with('all_data' , $all_data);
    }

      public function delete_news($id)
    {
    	
            YoutubeModel::where('ID', '=' , $id)->delete();
            return Redirect::back();
    }

        /* public function edit_page($id)
    {

    	$all_data=Featured_newsModel::where('news_id','=', $id)->first();
    	return view('admin.featured_news.edit_news')->with('data' , $all_data);
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
               Featured_newsModel::where('news_id','=', $request->ID)->update($update_model);           
               Session::flash('message', 'Thank you for your Update');

              return redirect::back(); 
    }*/
}
