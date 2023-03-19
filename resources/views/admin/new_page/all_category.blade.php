@extends('admin.layout.layout')


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
												
													<th>Image</th>
													
													<th>Title </th>
													<th>Description </th>
													<th>Action </th>


									<th></th>
									</tr>
								</thead>

							<tbody>
				<?php foreach($all_blog_data as$blog){?>
                                   <tr>
                                        <td><img src="{{URL::asset('uploads/'.$blog->image)}}"  height="100" width="100" /></td>
                                              
                                              
                                              
						<td><p>{{$blog->name}} </p></td>
						
						<td><p>{{$blog->comment}}</p></td>
						
						<td><a href="{{URL::to('admin/testimonial/delete/'.$blog->ID)}}">Delete</a></td>
					     </div>

                                   </tr>



					<?php } ?>

                                     </tbody>
                                </table>

                          </div>

                </div>

         </div>


</div>




@stop