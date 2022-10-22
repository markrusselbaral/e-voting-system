<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- Required library for webcam -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.24/webcam.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/vote.css') }}" />
</head>
<body>


<form method="POST" action="{{ route('submit.vote') }}">
	@csrf

<div class="row" hidden>
    <div class="col-md-6" hidden>
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

<input type="hidden" name="voter_id" value="{{ $LoggedUserInfo['id'] }}">
<div class="header_fixed">
	@foreach($candidates as $candidate)
        <table>
            <thead>
                <tr class="position">
                    <th>{{ $candidate->position }}</th>             
                </tr>
            </thead>
            <tbody>
                <tr>         
                    <td><img src=https://drive.google.com/uc?export=view&id=1qw3KUJnYgvnJHQP-yY13u_rXrJO8ZbL_ /></td>
                    <td>{{ $candidate->fname }}</td>
                    <td><button>View</button></td>
                    <td><input type="checkbox" name="check[]" value="{{ $candidate->id }}"></td>
                </tr>
            </tbody>
        </table>
        <br>

        @endforeach
         <input type="submit" name="" value="submit vote" onClick="take_snapshot()">
         <a href="{{ route('logout') }}">Logout</a>
    </div>
</form>







 <script>
	var seen = {};
	$('.position').each(function(){
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