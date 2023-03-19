@extends('admin.layout.layout')

@section('title', 'News')

@section('content')
<div class="page-content">
    <div class="col-xs-12">
  
  <form  method="post" action="{{URL::to('post_change_password')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
        @if (session('message'))
                    <div class="alert alert-success">
                             {{ session('message') }}
                    </div>
                           @endif
    
      <h4><a> Admin</a></h4>
         <div >
        <label ><h3>Admin Old Password :</h3></label>
        <div >
            <input type="password"  name="old_password" placeholder="Enter Old Password" required>
                          </div>
                    </div>
                     @if (session('error_old'))
                    <div class="alert alert-success" style="color:red">
                             {{ session('error_old') }}
                    </div>
                           @endif
                    
              <div >
        <label  ><h3>New Password :</h3></label>
        <div>
           <input type="password"  name="password" placeholder="Enter New Password"  required>
            </div>
             </div>
                    
             <div >
                 <label><h3>Retype New Password :</h3></label>
        <div>
        <input type="password"  name="confirm_password" placeholder="Enter Confirm Password"  required>
                          </div>
                    </div>
                    
                    @if (session('error_passwrd_message'))
                    <div class="alert alert-success" style="color:red">
                          {{ session('error_passwrd_message') }}
                          </div>
              @endif
                    
                <button  type="submit" class="btn btn-warning">Update</button>
                
  </form>
        
</div>  
      
</div>




@stop
     