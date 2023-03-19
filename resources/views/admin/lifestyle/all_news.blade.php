@extends('admin.layout.layout')

@section('title' ,'News ')

@section('content')

<div class="page-content">


 <div class="row">
 
   @if (session('message'))
                    <div class="alert alert-success" style="color:green">
                             {{ session('message') }}
                    </div>
                  @endif
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
												
													<th>Image</th>							
													<th>Title </th>
													<th>Description </th>
													<th width="15%">Action </th>


									<th></th>
									</tr>
								</thead>

							<tbody>
				<?php foreach($all_data as $data){?>
                                   <tr>
                                   <td><img src="{{URL::asset('uploads/'.$data->image)}}"  height="100" width="100" /></td>
                                              
                                              
                                              
						<td><p>{{$data->news_title}} </p></td>
						
						<td><p>{{Str::limit($data->news_description,25)}}</p></td>
						
						<td><a href="{{URL::to('admin/lifestyle_news/delete/'.$data->news_id)}}" onclick="return deleletconfig()">Delete</a>
				<a href="{{URL::to('admin/lifestyle_news/edit/'.$data->news_id)}}">  Edit</a></td>
					     </div>

                                   </tr>



					<?php } ?>

                                     </tbody>
                                </table>

                          </div>

                </div>

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