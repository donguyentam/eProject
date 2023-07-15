<font face="Arial">
<h3>We have received a request to reset your password.
</h3>
<h3><font color="#FF9600">Customer information</font></h3>
		<p>
			<strong class="info">Your name: </strong>
			{{$info['first_name']}} {{$info['last_name']}}
		</p>
		<p>
			<strong class="info">Email: </strong>
			{{$info['email']}}
		</p>

        <p> If this is not you, ignore this email, else <a href="{{ Route('resetPassword', $token) }}">click here to reset your password</a></p>



