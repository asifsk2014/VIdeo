@extends('admin.layout.layout')

@section('title' ,'News ')

@section('content')

<div class="page-content">


 <div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
												
													<!--<th>Image</th>-->							
													<th>Title </th>
													<th>Youtube Link</th>
													<th width="15%">Action </th>


									<th></th>
									</tr>
								</thead>

							<tbody>
				<?php foreach($all_data as $data){?>
                                   <tr>
                                   <!--<td><img src="{{URL::asset('uploads/'.$data->image)}}"  height="100" width="100" /></td>-->
                                              
                                              
                                              
						<td><p>{{$data->title}} </p></td>
						
						<td><p>{{$data->link}}</p></td>
						
						<td><a href="{{URL::to('admin/youtube_link/delete/'.$data->ID)}}" onclick="return deleletconfig()">Delete</a>
							<!--<a href="{{URL::to('admin/featured_news/edit/'.$data->news_id)}}">  Edit</a>--></td>
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