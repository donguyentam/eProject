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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<!--header start here-->
<div class="header">
		<div class="header-main">
		       <h1>User profile</h1>
			<div class="header-bottom">
@php
                     $user = Sentinel::check();
                     @endphp

				<div class="header-right w3agile">


					<div class="header-left-bottom agileinfo">

					 <form action="{{ Route('updateuserprofile',$user -> id) }}" method="post">

					 @csrf

                     <input type="hidden" class="form-control"  value="{{$user->id}}" name="id" />
								<span style="color:#ff6c6c">
									@error('email')

									{{$message}}

									@enderror
								</span>
                                @if($user -> username==null)

<div class="input-group mb-3">
    <input type="text" class="form-control" name="username"  placeholder="Username" maxlength="20" />
    </div>
@else
<div class="input-group mb-3">
    <input type="text" class="form-control" name="username" value="{{$user->username}}" maxlength="20" />
    </div>
@endif
                        @if($user -> first_name==null)

						<div class="input-group mb-3">
							<input type="text" class="form-control" name="fname"  placeholder="First name" maxlength="20" />
							</div>
                        @else
                        <div class="input-group mb-3">
							<input type="text" class="form-control" name="fname" value="{{$user->first_name}}" maxlength="20" />
							</div>
                        @endif



@if($user -> last_name==null)

<div class="input-group mb-3">
		<input type="text" class="form-control" name="lname"  placeholder="Last name" maxlength="20" />
		</div>
@else
<div class="input-group mb-3">
    <input type="text" class="form-control" name="lname" value="{{$user->last_name}}" maxlength="20" />
    </div>
@endif

@if($user -> address==null)

<div class="input-group mb-3">
							<input type="text" class="form-control" name="address"  placeholder="Address" maxlength="150"/>
							</div>
@else
<div class="input-group mb-3">
    <input type="text" class="form-control" name="address" value="{{$user->address}}" maxlength="150" />
    </div>
@endif

@if($user -> phone_number==null)

<div class="input-group mb-3">
							<input type="text" maxlength="15" class="form-control" name="phone_number"  placeholder="Phone number"  />
							</div>
@else
<div class="input-group mb-3">
    <input type="text" maxlength="15" class="form-control" name="phone_number" value="{{$user->phone_number}}"  />
    </div>
@endif

@if($user -> country==null)

<div class="input-group mb-3">
							<input type="text" class="form-control" name="country"  placeholder="Country" maxlength="50" />
							</div>
@else
<div class="input-group mb-3">
    <input type="text" class="form-control" name="country" value="{{$user->country}}" maxlength="50"  />
    </div>
@endif





						<input type="submit" class="btn btn-primary btn-block" value="Update">

					</form>



				</div>
				</div>

			</div>
		</div>
</div>
<!--header end here-->
<div class="copyright">
	<p>You want good, quality, durable and beautiful furniture? Come to the Free Shop of the best quality furniture in Vietnamese © 2023</p>
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


