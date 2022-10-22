<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - EVS</title>
	<!-- / Bootstrap Core -->	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- / FontAwesome -->	
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- / Custom style -->	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

	
</head>
<body>
<main>
	<div class="form-main-container">
		<div class="form-wrapper">
			<div class="form-header">
				<span class="form-title">
					E-Voting System
				</span>
			</div>
			<form class="form-content" action="{{ route('voter.login') }}" method="POST">
				@if(Session::get('fail'))
					{{ Session::get('fail') }}
				@endif
				@csrf
				<div class="input-wrapper">
					<input class="input-style" type="text" name="email" value="{{ old('email') }}" placeholder="ID no." style="text-align: center;" required> 
					@error('email'){{ $message }} @enderror
					<span class="input-style-focus"></span>
				</div>
				<button class="button-style w-100" type="submit">
					Login
				</button>
			</form>
		</div>
	</div>
</main>
</body>
</html>