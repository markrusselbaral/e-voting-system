<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="{{ asset('css/vote.css') }}" />
</head>
<body>
	<header>
		<nav>
			<div class="logo">
				<img src="{{ asset('images/bisu-logo4mp.svg') }}" alt="bisu-logo">
			</div>
			<div class="name">
				<p>Welcome {{ $LoggedUserInfo['email'] }}</p>
			</div>
			<div class="logout">
				<button type="submit"><img src="{{ asset('images/Logout.svg') }}"></button>
			</div>
		</nav>
	</header>

	<section>
		<div>
			<h1>SSG ELECTION 2022</h1>
		</div>
		<div class="position">	
			<form action="{{ route('submit.vote') }}" method="POST">
				@csrf
			<input type="hidden" name="voter_id" value="{{ $LoggedUserInfo['id'] }}">
			<div class="row" hidden>
		    	<div class="col-md-6">
		        	<div id="my_camera"></div>
		       		 <br/>
		        	<input type="hidden" name="image" class="image-tag">
		    	</div>
		   		 <div class="col-md-6" hidden>
		       		 <div id="results">Your captured image will appear here...</div>
		  		 </div>
		   		 <div class="col-md-12 text-center">
		       		 <br/>
		    	</div>
			</div>
			@foreach($candidates as $candidate)
			<div class="posName">
				<h2 class="positionR">{{ $candidate->position }}</h2>
			</div>
			<div class="posCon">
				<div class="con">
					<div class="canlogo">
						<img src="{{ asset('images/bisu-logo4mp.svg') }}">
					</div>
					<div class="canName">
						<p>{{ $candidate->fname }}</p>
						<h3>Name</h3>
					</div>
					<div class="party">
						<p>{{ $candidate->position }}</p>
						<h3>Party</h3>
					</div>
					<div class="details">
						<button class="details">Details</button>
					</div>
					<div class="check">
						<input type="checkbox" name="check[]" value="{{ $candidate->id }}">
					</div>
				</div>
			</div>
			@endforeach
			<div class="vote">
				<input type="submit" value="submit vote" onClick="take_snapshot()">
			</div>
			</form>
		</div>	
	</section>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.24/webcam.js"></script>
<script>
	var seen = {};
	$('.posName').each(function(){
		var txt = $(this).text();
		if(seen[txt])
			$(this).remove();
		else
			seen[txt] = true;
	});
</script>

<script>
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    
    Webcam.attach( '#my_camera' );
    
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>

</body>
</html>