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

<link rel="stylesheet" href="{{ URL::asset('css/styleloginad.css?v=2').time() }}">
<link rel="stylesheet" href="{{ URL::asset('/fe/css/bootstrap1.min.css?v=2').time() }}">
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


		       <h1>Reset Password</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">

					<div class="header-left-bottom agileinfo">

					 <form action="{{ Route('resetPasswordPost') }}" method="post">
					 @csrf

                     <input  type="hidden" name="token"  value="{{$token}}">
						<div class="input-group mb-3">
						<input type="text" class="form-control" disabled value="{{$email -> email}}" name="email" />

						</div>
						<span style="color:#ff6c6c ;width: 10px">

								@error('password')

								{{$message}}

								@enderror


							</span>
						<div class="input-group mb-3">
						<input type="password" class="form-control"  placeholder="Password" name="password"/>

						</div>

						<div class="input-group mb-3">
							<input type="password" class="form-control" id="password" name="password_confirmation"  placeholder="Confirm-Password" required />

							</div>



						<input type="submit" class="btn btn-primary btn-block" value="Reset">

					</form>


				</div>
				</div>

			</div>
		</div>
</div>
<!--header end here-->
<!--footer end here-->
<!-- jQuery -->
<script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/adminlte.min.js') }}"></script>
</body>
</html>


