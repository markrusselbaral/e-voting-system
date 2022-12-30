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
			<img src="images/bisu-logo.png" style="width: 140px; height: 140px; opacity: 0.8;">
		</div>
		<img src="images/bbilar_banner3.png">
	</div>
	<div class="LoginForm">
		<div class="loginContainer">
			<div class="admin">
				<div class="line"></div>
				<span style="font-weight: bold;">Admin</span>Access
			</div>

			<div class="email">
				<input type="text" name="" placeholder="Your Email">
			</div>

			<div class="password">
				<input type="password" name="" placeholder="Your Password">
			</div>

			<div class="login">
				<div class="remember">
					<input type="checkbox" name="" style="border-color: #D9D9D9;">
					<span style="font-weight: bold; color: #838181;">Remember me</span>
				</div>
				<input type="submit" name="" value="Login" class="button">
			</div>
		</div>
	</div>
</div>
</body>
</html>