<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style3.css') }}">
</head>
<body>
<!-- Header -->
<header>
	<div class="con1">
		<img src="{{ asset('images/icons8-voting-64.png') }}" class="voteLogo">
		<span style="color: white; font-weight: 800;">BISU BILAR E - VOTING SYSTEM</span>
	</div>
	<div class="con2">
		<span class="span1">
			<img src="{{ asset('images/bisu-logo.png') }}" class="bisuLogo">
		</span>
		<span class="span2" style="color: white; font-weight: 800;">Welcome Mark Russel Baral</span>
	</div>
</header>

<!-- Title -->
<span class="title">
	SSG ELECTION 2023
</span>

<!-- Candidates -->
<form action="{{ route('submit.vote') }}" method="POST">
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
				<button type="button" class="details" value="{{ $value->id }}">Details</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

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




</body>
</html>