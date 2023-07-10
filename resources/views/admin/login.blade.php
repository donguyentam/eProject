<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Classy Login form Widget Flat Responsive Widget Template :: w3layouts</title>
<script src="js/loginadmin.js"></script>
<!-- Custom Theme files -->

<link rel="stylesheet" href="{{ asset('/css/styleloginad.css') }}">
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header start here-->
<div class="header">
		<div class="header-main">


		       <h1>Login</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">

					<div class="header-left-bottom agileinfo">

					 <form action="{{ Route('processLogin') }}" method="post">
					 @csrf
						<div class="input-group mb-3">
						<input type="text" class="form-control"  placeholder="User name" name="email" />
						<div class="input-group-append">
							<div class="input-group-text">
							<span class="fas fa-lock"></span>
							</div>
						</div>
						</div>

						<div class="input-group mb-3">
						<input type="password" class="form-control"  placeholder="Password" name="password"/>
						<div class="input-group-append">
							<div class="input-group-text">
							<span class="fas fa-lock"></span>
							</div>
						</div>
						</div>

						<div class="remember">
			             <span class="checkbox1">
							   <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Remember me</label>
						 </span>
						 <div class="forgot">
						 	<h6><a href="{{ Route('forgetPassword') }}">Forgot Password?</a></h6>
						 </div>
						<div class="clear"> </div>
					  </div>
                        <div class="row">

                            <input type="submit" class="btn btn-primary col-6" value="Login">

                                <a class="btn4" href="{{ Route('register') }}">Register</a>

                        </div>

					</form>

				</div>
				</div>

			</div>
		</div>
</div>
<!--header end here-->
<div class="copyright">
	<p>You want good, quality, durable and beautiful furniture? Come to Wood Express where we have the best quality furniture in Vietnam ©2023</p>
</div>
<!--footer end here-->
<!-- jQuery -->
<script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/adminlte.min.js') }}"></script>
</body>
</html>


