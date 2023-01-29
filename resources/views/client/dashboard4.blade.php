<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style3.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #424242">
        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: white; font-weight: bold;">Candidate Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: white;"></button>
      </div>
      <div class="modal-body" style="background-color: #FEF9F9;">
      	<div style="background-color: white; border: 1px solid #D7D1D1;">
        <div class="banner_img">
        	<img src="{{ asset('images/bbilar_banner.png') }}">
        </div>
        <div class="profile_img">
        	<img src="{{ asset('images/image 1.png') }}" id="candidate-picture" style="width: 100px; height: 100px; border: 1px solid #D7D1D1; border-radius: 100%;">
        	<span style="font-weight: bold; font-size: 1.3em;" id="fullname"></span>
        </div>
        
        <div class="info">
        	<div>
        		<span style="font-weight: bold; color: #756F6F; font-size: .9em;">Position:</span>
        		<span style="font-weight: bold; font-size: 1.2em" id="position"></span>
        	</div>
        	<div>
        		<span style="font-weight: bold; color: #756F6F; font-size: .9em;">Party:</span>
        		<span style="font-weight: bold; font-size: 1.2em" id="partylists"></span>
        	</div>
        </div>
        <div class="info">
        	<div>
        		<span style="font-weight: bold; color: #756F6F; font-size: .9em;">Course & Section:</span>
        		<span style="font-weight: bold; font-size: 1.2em" id="course_sections"></span>
        	</div>
        	<div>
        		<span style="font-weight: bold; color: #756F6F; font-size: .9em;">Department:</span>
        		<span style="font-weight: bold; font-size: 1.2em" id="departments"></span>
        	</div>
        </div>
        <div class="info">
        	<div>
        		<span style="font-weight: bold; color: #756F6F; font-size: .9em;">College:</span>
        		<span style="font-weight: bold; font-size: 1.2em" id="colleges"></span>
        	</div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Header -->
<header class="header">
	<div class="con1">
		<img src="{{ asset('images/icons8-voting-64.png') }}" class="voteLogo">
		<span style="color: white; font-weight: 800;">BISU BILAR E - VOTING SYSTEM</span>
	</div>
	<div class="con2">
		<span class="span1">
			<img src="{{ asset('images/bisu-logo.png') }}" class="bisuLogo">
		</span>
		<span class="span2" style="color: white; font-weight: 800;">Welcome {{ $LoggedUserInfo['fname'] }} {{ $LoggedUserInfo['lname'] }}</span>
	</div>
</header>

<!-- Title -->
<span class="title">
	SSG ELECTION 2023
</span>

<!-- Candidates -->
<form action="{{ route('submit.vote') }}" method="POST" class="form">
	@csrf
<input type="hidden" name="voter_id" value="{{ $LoggedUserInfo['id'] }}">

@foreach($candidates as $candidate)
<div class="positionContainer">
	<div class="position">
		{{ $candidate->position }}
	</div>

	<div class="canName">
		<span style="width:100%; margin-top: .5rem; font-weight: bold; padding-left: 1.4rem;">Select only {{ $candidate->position_order }} candidate(s)</span>
		@foreach($candidate->candidate as $value)
		<div class="candidates">
			<span style="width: 60%; font-weight: bold;">
				{{ $value->fname }} {{ $value->lname }}
			</span>
			<span style="width: 20%">
				<button type="button" class="details editbtn" value="{{ $value->id }}">Details</button>
			</span>
			<span style="width: 20%">
				<input type="checkbox" name="check[]" value="{{ $value->id }}" class="{{ $value->id }} canCheck{{ $candidate->id }}" onclick="return limitCheck{{ $candidate->id }}()">
				<input type="checkbox" name="position[]" value="{{ $value->position_id }}" class="{{ $value->id }}" hidden>
			</span>
		</div>
		@endforeach
	</div>
</div>

@endforeach

<div class="buttonCon">
	<input type="submit" value="SUBMIT VOTES">
</div>
</form>

<div class="confirmation">
	<div class="conbox">
		<span style="font-weight: bold; font-size: 1.5em; margin-top: 2rem;">OTP Verification</span>
		<div class="email">
			<div style="font-weight: bold;">
				We’ve sent verification code to your email - {{ $LoggedUserInfo['email'] }}
			</div>
		</div>
		<input type="text" id="verify" name="verify" placeholder="Enter verification code" style="border: 1px solid #D9D9D9; text-align: center;">
		<span id="span"></span>
		<input type="submit" style="background-color: #310165; color: white; border: none; height: 40px; margin-bottom: 3rem; font-weight: bold;" onclick="addData();">
	</div>	
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
@include('admin.includes.voters-show-modal')

@foreach($candidates as $candidate)
	@foreach($candidate->candidate as $value)
	<script>
	    var chk1{{ $value->id }} = $(".{{ $value->id }}");
	    var chk2{{ $value->id }} = $(".{{ $value->id }}");

	    chk1{{ $value->id }}.on('change', function(){
	        chk2{{ $value->id }}.prop('checked',this.checked);
	    });
	</script>
	@endforeach
@endforeach

@foreach($candidates as $candidate)
<script>
	function limitCheck{{ $candidate->id }}()
	{
		var a{{ $candidate->id }} = document.getElementsByClassName('canCheck{{ $candidate->id }}');
		var newvar{{ $candidate->id }} = 0;
		var count{{ $candidate->id }};
		for(count{{ $candidate->id }}=0; count{{ $candidate->id }}<a{{ $candidate->id }}.length; count{{ $candidate->id }}++)
		{
			if (a{{ $candidate->id }}[count{{ $candidate->id }}].checked==true) {
				newvar{{ $candidate->id }} = newvar{{ $candidate->id }} + 1;
			}
		}

		if(newvar{{ $candidate->id }}>{{ $candidate->position_order }})
		{
			alert('Select only {{ $candidate->position_order }} candidate(s)');
			return false;
		}
	}
</script>
@endforeach

<script>

$.ajaxSetup({
	headers:{
	   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}

})

	var header = $('.header');
 	var title = $('.title');
 	var button = $('.buttonCon');
 	var form = $('.form');
 	var confirmation = $('.confirmation');
 	


 			header.addClass('header2');
			title.addClass('title2');
			button.addClass('buttonCon2');
			form.addClass('form2');

 function addData(){
 	var span = $('#span');
 	var verify = $('#verify').val();
	$.ajax({
	type: "POST",
	dataType: "json",
	data: {verify:verify},
	url: "/verify",
	success: function(data){
		console.log(data)
		if(data == "success")
		{
			confirmation.css('display', 'none');
			header.removeClass('header2');
			title.removeClass('title2');
			button.removeClass('buttonCon2');
			form.removeClass('form2');
		}
		if(data == "Invalid Verification Code")
		{
			alert(data);
		}
	}


});

}
</script>



</body>
</html>