<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="container">
	<div class="bisuLogo">
		<div class="blue" style="background-color: rgba(49, 1, 101, 80%); width: 35%; height: 100vh; position: absolute;">
			<img src="{{ asset('images/bisu-logo.png') }}" style="width: 140px; height: 140px; opacity: 0.8;">
		</div>
		<img src="{{ asset('images/bbilar_banner3.png') }}">
	</div>
	
	<div class="LoginForm">

		<form action="{{ route('admin-login') }}" method="POST" class="loginContainer">
			@csrf
			<div class="admin">
				<div class="line"></div>
				<span style="font-weight: bold;">Admin</span>Access
			</div>

			<div class="email">
				<input type="text" name="email" value="{{ old('email') }}" placeholder="Your Email" required>
				@if ($errors->has('email'))
                    <span style="color: red; display: flex; justify-content: center; align-items: center;">
					{{ $errors->first('email') }}
				</span>
                 @endif
			</div>

			<div class="password">
				<input type="password" name="password" placeholder="Your Password" value="{{ old('email') }}">
				
				@if($errors->has('password'))
				<span style="color: red; display: flex; justify-content: center; align-items: center;">
					{{ $errors->first('password') }}
				</span>
				@endif
			
			</div>

			<div class="login">
				<div class="remember">
					<input type="checkbox" name="" style="border-color: #D9D9D9;">
					<span style="font-weight: bold; color: #838181;">Remember me</span>
				</div>
				<input type="submit" name="" value="Login" class="button">
			</div>
		</form>
	</div>
	
</div>
</body>
</html>