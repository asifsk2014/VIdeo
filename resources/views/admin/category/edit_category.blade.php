@extends('admin.layout.layout')

@section('title','News')

@section('content')
<div class="page-content">
    <div class="col-xs-12">
  
  <form  method="post" action="{{URL::to('post_edit_category')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="ID" value="<?= $data->ID ?>">
        @if (session('message'))
                    <div class="alert alert-success">
                             {{ session('message') }}
                    </div>
                           @endif
    
      <div class="add-section_block">            
  <h4 class="pink"><i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer"></i> <a>Category</a></h4>

                            
                      <select class="form-control" id="form-field-select" name="sub_id" required=true>
                            <option value="select">Select Categories</option>
                            
                            <option value="">Technology</option> 
                            <option value="">Business</option>
                            <option value="">Entertainment</option> 
                            <option value="">Sports</option>
                             <option value="">World News</option>    
                                                             
                      </select> 
   </div> 
        <label ><h4>Add Category :</h4></label>
        <div >
            <input type="text"  name="category" placeholder="Enter Category" value="<?php echo $data->category_name ?>" required><br><br>
        </div>
      
                <button  type="submit" class="btn btn-warning">Update</button>
                
  </form>
        
</div>  
      
</div>


@stop