<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Mobile Specific Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9" />
<title>News Login</title>
<!-- ================= css ==================== -->
<link href="{{URL::asset('admin/css/bootstrap-theme.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('admin/css/responsive.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('admin/css/style.css')}}" rel="stylesheet" type="text/css">

 <link rel="shortcut icon" href="{{URL::asset('favicon.ico')}}" type="image/x-icon">
      <link rel="icon" href="{{URL::asset('favicon.ico')}}" type="image/x-icon">
<!-- ================= css ==================== -->
<!-- ========================== js ========================== -->
<script src="{{URL::asset('admin/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('admin/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- ========================== js ========================== -->
</head>
<body>
<div class="container">
  <div class="card card-container"> <!-- <img id="profile-img" class="profile-img-card" src="images/profile_pic.png">
    <p id="profile-name" class="profile-name-card"></p>  -->
    <form method ="post"  action ="{{URL::to('login_check')}}" enctype ="multipart/form-data" class="form-signin" id="center_login">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
      <h3>Worker Visa Admin Login</h3>

      @if (session('message'))
                    <div class="alert alert-success" style="color:red">
                             {{ session('message') }}
                    </div>
           @endif

      <span id="reauth-user" class="reauth-user"></span>
      <input type="text" id="inputUser" class="form-control" name="username" placeholder="User Id" required autofocus>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <div id="remember" class="checkbox">
        <label>
          <input type="checkbox" value="remember-me">
          Remember me </label>
      </div>
      <button class="btn btn-lg btn-success btn-block btn-signin" type="submit">Login</button>
    </form>
    <!-- /form -->
   <!-- <a href="#" class="forgot-password"> Forgot the password? </a> </div>-->
  <!-- /card-container -->
</div>
</body>
</html
