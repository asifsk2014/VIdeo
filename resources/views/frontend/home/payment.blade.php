<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Medula+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{URL('payment/css/bootstrap.min.css')}}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{URL('payment/css/style.css')}}" />


</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h2>Buy Video Course</h2>
							<p>In this course, you will learn the fundamentals of video editing, including how to use editing software, create compelling video content, and edit different types of videos such as short films, documentaries, and social media content.</p>
						</div>
                         <form method ="post"  action ="{{URL::to('video_course')}}" enctype ="multipart/form-data" class="form-signin" id="center_login">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <input type="hidden" id="amount" name="amount" value="299">

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<span class="form-label">Name</span>
										<input id="name" class="form-control" name="name" type="text" required autofocus>
									</div>
								</div>
                            </div>
                            <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<span class="form-label">Phone Number</span>
										<input id="number" maxlength="10" name="number" class="form-control" type="number" required>
									</div>
								</div>
							</div>
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="form-label">Email</span>
                                        <input id="email" name="email" class="form-control" type="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
								<button class="submit-btn">Buy Course</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    @if(Session::has('data'))
 
    <div class="container tex-center mx-auto">
    <form action="/pay_check" method="POST" class="text-center mx-auto mt-5">
      <script
          src="https://checkout.razorpay.com/v1/checkout.js"
          data-key="rzp_test_S81SwbJh97Bc4w"
         data-amount="{{Session::get('data.amount')}}" 
          data-currency="INR"
         data-order_id="{{Session::get('data.order_id')}}"
          data-buttontext="Pay with Razorpay"
          data-name="Coffee"
          data-description="Test transaction"
         
          data-theme.color="#F37254"
      ></script>
      <input type="hidden" custom="Hidden Element" name="hidden">
      </form>

    </div>
    
    @endif

    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>