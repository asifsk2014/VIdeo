@extends('admin.layout.layout')

@section('title','Worker Visa')

@section('content')
<style>
    .stretch-card>.card {
        width: 100%;
        min-width: 100%
    }

    body {
        background-color: #f9f9fa
    }

    .flex {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto
    }

    @media (max-width:991.98px) {
        .padding {
            padding: 1.5rem
        }
    }

    @media (max-width:767.98px) {
        .padding {
            padding: 1rem
        }
    }

    .padding {
        padding: 3rem
    }

    .box {
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        border-top: 3px solid #d2d6de;
        margin-bottom: 20px;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1)
    }

    .box-header.with-border {
        border-bottom: 1px solid #f4f4f4
    }

    .box-header {
        color: #444;
        display: block;
        padding: 10px;
        position: relative
    }

    .box-header:before,
    .box-body:before,
    .box-footer:before,
    .box-header:after,
    .box-body:after,
    .box-footer:after {
        content: "";
        display: table
    }

    .box-header .box-title {
        display: inline-block;
        font-size: 18px;
        margin: 0;
        line-height: 1
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-family: 'Source Sans Pro', sans-serif
    }

    .box-header:after,
    .box-body:after,
    .box-footer:after {
        content: "";
        display: table
    }

    .box-body {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        padding: 10px
    }

    .box-body>.table {
        margin-bottom: 0
    }

    .table-bordered {
        border: 1px solid #f4f4f4
    }

    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px
    }

    table {
        background-color: transparent
    }

    .table tr td .progress {
        margin-top: 5px
    }

    .progress-bar-danger {
        background-color: #dd4b39
    }

    .progress-xs {
        height: 7px
    }

    .bg-red {
        background-color: #dd4b39 !important;
        color: #fff
    }

    .badge {
        display: inline-block;
        min-width: 10px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        background-color: #777;
        border-radius: 10px
    }

    .progress-bar-yellow,
    .progress-bar-warning {
        background-color: #f39c12
    }

    .bg-yellow {
        background-color: #f39c12
    }

    .progress-bar-primary {
        background-color: #3c8dbc
    }

    .bg-light-blue {
        background-color: #3c8dbc
    }

    .progress-bar-success {
        background-color: #00a65a
    }

    .bg-green {
        background-color: #00a65a
    }

    .box-footer {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-top: 1px solid #f4f4f4;
        padding: 10px;
        background-color: #fff
    }

    .pull-right {
        float: right !important
    }

    .pagination>li {
        display: inline
    }

    .pagination-sm>li:first-child>a,
    .pagination-sm>li:first-child>span {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px
    }

    .pagination>li:first-child>a,
    .pagination>li:first-child>span {
        margin-left: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px
    }

    .pagination>li>a {
        background: #fafafa;
        color: #666
    }

    .pagination-sm>li>a,
    .pagination-sm>li>span {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5
    }

    .pagination>li>a,
    .pagination>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd
    }

    .cursor-none {
        cursor: default;
        pointer-events: none;
        color: #333
    }

    a {
        background-color: transparent
    }
</style>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Exam Data</h3>
                    </div> <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Qualification</th>
                                    <th>City</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Progress</th>
                                    <th style="width: 40px">Label</th>
                                    <th style="width: 202px">Action</th>
                                </tr>
                                <?php foreach($all_data as $data){?>
                                <tr>
                                    <td>{{$data->ID}}.</td>
                                    <td>{{$data->user_name}}</td>
                                    <td>{{$data->user_email}}</td>
                                    <td>{{$data->user_phone}}</td>
                                    <td>{{$data->qualification}}</td>
                                    <td>{{$data->city}}</td>
                                    <td>{{$data->user_datetime}}</td>
                                    @if (($data->status =='confirm'))
                                    <td><span class="badge badge-success">Confirmed</span></td>

                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                                        </div>
                                    </td>

                                    <td><span class="badge bg-green">100%</span></td>
                                    @elseif ($data->status =='pending')
                                    <td><span class="badge badge-info">pending</span></td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-primary" style="width: 65%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-yellow">70%</span></td>
                                    @else
                                    <td><span class="badge badge-danger">Failed</span></td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-yellow" style="width:35%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-red">50%</span></td>

                                    @endif
                                    <!-- <td><span  class="{{ ($data->status =='failed') ? 'badge badge-danger': ($data->status =='confirm')?'badge badge-success' :'badge badge-info'}} " >{{$data->status}}</span></td> -->

                                    <td>
                                        <button 
                                            class="login100-form-btn  {{ ($data->status =='confirm') ? 'cursor-none':''}}"
                                            onclick="return confirmConfig({{$data->ID}})">
                                            Confirm
                                        </button>
                                        <button
                                            class="login100-form-btn  {{ ($data->status =='confirm') ? 'cursor-none':''}}"
                                            onclick="return failedconfig({{$data->ID}})">
                                            Reject
                                        </button>
                                        <button
                                            class="login100-form-btn  {{ ($data->status =='confirm') ? 'cursor-none':''}}"
                                            onclick="return deleteconfig({{$data->ID}})">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>

                                <!-- <tr>
                                     <td>2.</td>
                                     <td>Upload new SQL file</td>
									 <td><span class="badge badge-danger">Confirmed</span></td>
                                     <td>
                                         <div class="progress progress-xs">
                                             <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                         </div>
                                     </td>
                                     <td><span class="badge bg-yellow">70%</span></td>
                                 </tr>
                                 <tr>
                                     <td>3.</td>
                                     <td>Cron job running</td>
									 <td><span class="badge badge-success">Pending</span></td>
                                     <td>
                                         <div class="progress progress-xs progress-striped active">
                                             <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                         </div>
                                     </td>
                                     <td><span class="badge bg-light-blue">30%</span></td>
                                 </tr>
                                 <tr>
                                     <td>4.</td>
                                     <td>Fix and remove bugs</td>
									 <td><span class="badge badge-info">Confirmed</span></td>
                                     <td>
                                         <div class="progress progress-xs progress-striped active">
                                             <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                         </div>
                                     </td>
                                     <td><span class="badge bg-green">90%</span></td>
                                 </tr> -->
                            </tbody>
                        </table>
                    </div> <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#" data-abc="true">«</a></li>
                            <li><a href="#" data-abc="true">1</a></li>
                            <li><a href="#" data-abc="true">2</a></li>
                            <li><a href="#" data-abc="true">3</a></li>
                            <li><a href="#" data-abc="true">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmConfig(id) {

        var del = confirm("Are you sure you want to Confirm this record?");
        if (del == true) {
            del = "Press OK to Confirm";
            document.location.href=window.location.origin+'/update_edit_category/'+id;
        }
    }
    function failedconfig(id) {

    var del = confirm("Are you sure you want to Reject this record?");
    if (del == true) {
        del = "Press OK to Failed";
        document.location.href=window.location.origin+'/updateStatusReject/'+id;

    }
    }

    function deleteconfig(id) {

    var del = confirm("Are you sure you want to Delete this record?");
    if (del == true) {
        del = "Press OK to deleted";
        document.location.href=window.location.origin+'/deleteUser/'+id;

    }
    }
</script>
@stop