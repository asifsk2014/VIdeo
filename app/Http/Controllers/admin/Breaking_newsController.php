<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin\Breaking_newsModel;
use App\admin\HeadlineModel;
use Illuminate\Support\Facades\Redirect ;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Image;
use Stroage;

class Breaking_newsController extends Controller
{

	public function headline()
	{
		$data=HeadlineModel::all();
		return view('admin.breaking_news.headline')->with('data' , $data);
	}

	public function headline_post(Request $request)
	{
		$add_headline=$request->headline;

		$headline_model= new HeadlineModel;

		$headline_model->head_line=$add_headline;

		$headline_model->save();
		Session::flash('message','Successfully Submit headline');
		return redirect::back();
	}
     public function delete_headline($id)
    {
      
     
        HeadlineModel::where('ID', '=' , $id)->delete();
        
        Session::flash('message','Successfully delete headline');
        return Redirect::back();
    }
	
	
	
    public function add_news()
    {
    	return view('admin.breaking_news.add_news');
    }

    public function news_post(Request $request)
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
        
               $news_model= new Breaking_newsModel;
               $news_model->news_title=$add_title;
               $news_model->news_description=$add_description;
               $news_model->update_date=$add_date;
               $news_model->image=$a_file;
               $news_model->save();             
               Session::flash('message', 'Thank you for your Post');

              return redirect::back();
       
          }


    }
    public function all_news_list()
    {

    	$all_data=Breaking_newsModel::all();
    	return view('admin.breaking_news.all_news')->with('all_data' , $all_data);
    }

    public function delete_news($id)
    {
    	$image=Breaking_newsModel::where('news_id','=', $id)->get()->toArray()[0]["image"];
                   $url = base_path()."/public/uploads/".$image;
           chmod($url,0777);
           unlink($url);

            Breaking_newsModel::where('news_id', '=' , $id)->delete();
            return Redirect::back();
    }

    public function edit_page($id)
    {

    	$all_data=Breaking_newsModel::where('news_id','=', $id)->first();
    	return view('admin.breaking_news.edit_news')->with('data' , $all_data);
    }

    public function update(Request $request)
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
               Breaking_newsModel::where('news_id','=', $request->ID)->update($update_model);           
               Session::flash('message', 'Thank you for your Update');

              return redirect::back(); 
    }
}
