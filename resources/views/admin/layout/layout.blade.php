<!DOCTYPE html>
<html lang="en">
<title>Worker VIsa</title>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Dashboard - Worker Visa Admin</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{URL::asset('css/admin/bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{URL::asset('css/admin/font-awesome.min.css')}}" />

    <!-- page specific plugin styles -->

    <link rel="stylesheet" href="{{URL::asset('css/admin/dropzone.css')}}" />

    <!-- text fonts -->
    <link rel="stylesheet" href="{{URL::asset('css/admin/fonts.googleapis.com.css')}}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{URL::asset('css/admin/ace.min.css')}}" class="ace-main-stylesheet"
        id="main-ace-style" />

    <!--[if lte IE 9]>
            <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
    <link rel="stylesheet" href="{{URL::asset('css/admin/ace-skins.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css/admin/ace-rtl.min.css')}}" />

    <link rel="stylesheet" href="{{URL::asset('css/jquery-te-1.4.0.css')}}" />

    <link rel="shortcut icon" href="{{URL::asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{URL::asset('favicon.ico')}}" type="image/x-icon">


    <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{URL::asset('js/admin/ace-extra.min.js')}}"></script>
</head>

<body class="no-skin">
    @include('admin.include.header')

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>

        <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('sidebar')
                } catch (e) {}
            </script>


            <ul class="nav nav-list">
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-user"></i>
                        <span class="menu-text">User Data</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="">
                            <a href="{{URL::to('admin/all_category')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                All User
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{URL::to('admin/category')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add User
                            </a>

                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-university"></i>
                        <span class="menu-text">Exam Data</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{URL::to('admin/list/sub_category')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Exam Data
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-circle-o"></i>
                        <span class="menu-text">Profile</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{URL::to('admin/news/Headline')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                New Profile
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="{{URL::to('admin/add/breaking_news')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add Profile
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-pencil-square-o"></i>
                        <span class="menu-text">Qualify Data</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{URL::to('admin/list/featured_news')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                All Qualify Data
                            </a>

                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
                        data-icon1="ace-icon fa fa-angle-double-left"
                        data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
        </div>

        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Home</a>
                        </li>
                    </ul><!-- /.breadcrumb -->
                </div>

                @yield('content')


            </div>
        </div><!-- /.main-content -->


        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="{{URL::asset('js/admin/jquery-2.1.4.min.js')}}"></script>

    <script src="{{URL::asset('js/jquery-te-1.4.0.min.js')}}"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write(
            "<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
          <script src="assets/js/excanvas.min.js"></script>
        <![endif]-->
    <script src="{{URL::asset('js/admin/jquery-ui.custom.min.js')}}"></script>
    <script src="{{URL::asset('js/admin/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{URL::asset('js/admin/jquery.easypiechart.min.js')}}"></script>
    <script src="{{URL::asset('js/admin/jquery.sparkline.index.min.js')}}"></script>
    <script src="{{URL::asset('js/admin/jquery.flot.min.js')}}"></script>
    <script src="{{URL::asset('js/admin/jquery.flot.pie.min.js')}}"></script>
    <script src="{{URl::asset('js/admin/jquery.flot.resize.min.js')}}"></script>

    <!-- ace scripts -->
    <script src="{{URL::asset('js/admin/ace-elements.min.js')}}"></script>

    <script src="{{URL::asset('js/admin/ace.min.js')}}"></script>

    <!-- inline scripts related to this page -->


    <script>
        $('.jqte-test').jqte();

        // settings of status
        var jqteStatus = true;
        $(".status").click(function () {
            jqteStatus = jqteStatus ? false : true;
            $('.jqte-test').jqte({
                "status": jqteStatus
            })
        });
    </script>

</body>

</html>