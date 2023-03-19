@extends('admin.layout.layout')

@section('title','News')

@section('content')
<div class="page-content">
    <div class="col-xs-12">
    
     <label><h4>Delete Previous Headline</h4>
    <?php foreach($data as $headline)  {?>            
      <a href="{{URL::to('admin/news/headline/delete/'.$headline->ID)}}" onclick="return deleletconfig()">Delete</a>
     <?php  }?>
   </label>

  
  <form  method="post" action="{{URL::to('post_headline')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
        @if (session('message'))
                    <div class="alert alert-success" style="color:green">
                             {{ session('message') }}
                    </div>
                           @endif
    
      <h3><a>Headline</a></h3>
         <div >
        <label ><h4>Add Headline :</h4></label>
        <div >
            <input type="text"  name="headline" placeholder="Enter Headline" required><br><br>
        </div>
      
                <button  type="submit" class="btn btn-warning">Submit</button>
                
  </form>
        
</div>  
      
</div>

<script>
    function deleletconfig(){

    var del=confirm("Are you sure you want to delete this record?");
    if (del==true){
       del="Press OK to deleted";   
    }
    return del;
    }
</script>


@stop