@extends('admin.layout.layout')

@section('title' ,'News')

@section('content')

<style>

/* styles de base si JS est activé */
.js .input-file-container {
  position: relative;
  width: 565px;
  text-align: center;
}
.js .input-file-trigger {
  display: block;
  padding: 14px 45px;
  background: #8A94BE;
  color: white;
  font-size: 1em;
  transition: all .4s;
  cursor: pointer;
  border-radius: 10px;
}
.js .input-file {
  position: absolute;
  top: 0; left: 0;
  width: 225px;
  padding: 14px 0;
  opacity: 0;
  cursor: pointer;
}
 
/* quelques styles d'interactions */
.js .input-file:hover + .input-file-trigger,
.js .input-file:focus + .input-file-trigger,
.js .input-file-trigger:hover,
.js .input-file-trigger:focus {
  background: #962399;
  text-decoration:none !important;
}
 
/* styles du retour visuel */
.file-return {
  margin: 0;
}
.file-return:not(:empty) {
  margin: 1em 0;
}
.js .file-return {
  font-style: italic;
  font-size: .9em;
  font-weight: bold;
}

.credit
{
  border: 1px solid #ddd;
  padding : 2px;
  width: 410px;
  background: #eee;
  border-radius: 5px;
  position: absolute;
  bottom: 0;
}


</style>

<script>

// ajout de la classe JS à HTML
document.querySelector("html").classList.add('js');
 
// initialisation des variables
var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
 
// action lorsque la "barre d'espace" ou "Entrée" est pressée
button.addEventListener( "keydown", function( event ) {
    if ( event.keyCode == 13 || event.keyCode == 32 ) {
        fileInput.focus();
    }
});
 
// action lorsque le label est cliqué
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});
 
// affiche un retour visuel dès que input:file change
fileInput.addEventListener( "change", function( event ) {  
    //the_return.innerHTML = this.value;
    $('#labelFU').text("Choosen file : " + this.value);
});



</script>

<div class="page-content">

<h4 class="pink">
                   <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i> 
                  <a> Add Category</a>
                </h4>
<form method="post" action="{{URL::to('post_category')}}" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{csrf_token()}}">

                  @if (session('message'))
                    <div class="alert alert-success" style="color:green">
                             {{ session('message') }}
                    </div>
                  @endif

   <div class="add-section_block">            

                            
                      <select class="form-control" id="form-field-select" name="sub_id" required=true>
                            <option value="">Select Categories</option>
                            <option value="1">Technology</option> 
                            <option value="2">Business</option>
                            <option value="3">Entertainment</option> 
                            <option value="4">Sports</option>
                             <option value="5">World News</option>    
                                                             
                      </select> 
   </div> 

   <label ><h4>Add Category :</h4></label>
        <div >
            <input type="text"  name="category" placeholder="Enter Category" required><br><br>
   </div>



<button type="submit" class="btn btn-warning">Submit</button>
</form>



</div>




@stop