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
    <meta name="keywords"
        content="Forgot password" />
    <!-- //for-mobile-apps -->
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
    <!--header start here-->
    <div class="header">
        <div class="header-main">


            <h1>Forgot password?</h1>
            <div class="header-bottom">
                <div class="header-right w3agile">

                    <div class="header-left-bottom agileinfo">
                    @if(session()->has('success'))
						<div style="color:#3aff76; font-size: larger;" class ="alert alert_success">
							{{session()->get('success')}}
						</div>
						@endif
                        <form action="{{ Route('forgetPasswordPost') }}" method="post">
                            @csrf
                            <span style="color:#ff6c6c ;width: 10px">

								@error('email')

								{{$message}}

								@enderror


							</span>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Email" name="email" />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                             <input type="submit" class="btn btn-primary btn-block" value="Send e-mail to reset password">
                        </form>




                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--header end here-->
    <div class="copyright">
        <p>You want good, quality, durable and beautiful furniture? Come to the Free Shop of the best quality furniture
            in Vietnamese © 2023</p>
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
