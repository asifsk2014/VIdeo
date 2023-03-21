<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>VIdeo Course - CK Tech education</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{URL('paument_new/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{URL('paument_new/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{URL('paument_new/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{URL('paument_new/css/style.css')}}" rel="stylesheet">
</head>
<style>

.razorpay-payment-button {
	color: #fff;
	background-color: #F3BD00;
	font-weight: 700;
	height: 55px;
	font-size: 18px;
	border: none;
	display: block;
	text-transform: uppercase;
	width: 100%;
}
</style>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Appointment Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100" src="{{URL('paument_new/img/about-1.jpg')}}" alt="" style="object-fit: cover;">
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="{{URL('paument_new/img/about-2.jpg')}}" alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <h6 class="text-primary text-uppercase mb-2">Appointment</h6>
                    <h1 class="display-6 mb-4">Make An Appointment To Pass Test & Get A License On The First Try</h1>
                    @if(Session::has('data'))

                    <form class="form-signin" id="center_login">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input class="form-control border-0 bg-light" placeholder="Your Course Amount" value="{{Session::get('data.amount')}}" name="amount" class="form-control" type="text" disabled >
                                    <label for="cname">Course Amount in INR</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input value="{{Session::get('data.order_id')}}" type="text" class="form-control border-0 bg-light"  placeholder="Name" name="name" type="text" autofocus disabled>
                                    <label for="gname">Your Order ID</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input value="{{Session::get('data.name')}}" type="text" class="form-control border-0 bg-light"  placeholder="Name" name="name" type="text" autofocus disabled>
                                    <label for="gname">Your Name</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input id="number" maxlength="10" name="number"  class="form-control border-0 bg-light" value="{{Session::get('data.phone')}}" placeholder="Phone Number"  type="number" disabled>                                   
                                    <label for="gmail">Your Phone Number</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input class="form-control border-0 bg-light" placeholder="Your Email Address" value="{{Session::get('data.username')}}" name="email" class="form-control" type="email" disabled >
                                    
                                    <label for="cname">Your Email Address</label>
                                </div>
                            </div>
                        </div>
                    </form>
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
                     @endif

                </div>
            </div>
        </div>
    </div>

 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Get In Touch</h4>
                <h2 class="text-primary mb-4"><i class="fa fa-graduation-cap"></i></i>CK TECH</h2>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+022 345 6890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Quick Links</h4>
                <a class="btn btn-link" href="{{URL::to('/about')}}">About Us</a>
                <a class="btn btn-link" href="{{URL::to('/')}}">Contact Us</a>
                <a class="btn btn-link" href="{{URL::to('/')}}">Our Services</a>
                <a class="btn btn-link" href="{{URL::to('/terms-condition')}}">Terms & Condition</a>
                <a class="btn btn-link" href="{{URL::to('/terms-condition')}}">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Popular Links</h4>
                <a class="btn btn-link" href="{{URL::to('/about')}}">About Us</a>
                <a class="btn btn-link" href="{{URL::to('/')}}">Contact Us</a>
                <a class="btn btn-link" href="{{URL::to('/')}}">Our Services</a>
                <a class="btn btn-link" href="{{URL::to('/terms-condition')}}">Terms & Condition</a>
                <a class="btn btn-link" href="{{URL::to('/terms-condition')}}">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Newsletter</h4>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-3 border-0" placeholder="Your Email Address">
                        <button class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
                <h6 class="text-white mt-4 mb-3">Follow Us</h6>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-light me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a href="#">CK TECH</a>, All Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a href="https://htmlcodex.com">CK TECH WEB</a>
                <br>Distributed By: <a href="https://themewagon.com" target="_blank">CK TECH</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{URL('paument_new/lib/wow/wow.min.js')}}"></script>
    <script src="{{URL('paument_new/lib/easing/easing.min.js')}}"></script>
    <script src="{{URL('paument_new/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{URL('paument_new/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{URL('paument_new/js/main.js')}}"></script>
</body>

</html>