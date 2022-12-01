<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style2.css') }}">
</head>
<body>
<header>
	<div class="con1">
		<img src="bisu-logo4mp 1.png" class="logo" style="background-color: #424242;">
	</div>
	<div class="con2" style="background-color: #424242;">Bisu Bilar E-Voting System</div>
	<div class="con3">
	</div>
</header>

<section>
    <h2 style="text-align: center; padding-top: 4rem;">SSG ELECTION 2022</h2>

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


    <div class="container" style="background-color: white;">
        @foreach($candidates as $candidate)
      <span style="font-size: 1.5em;background-color: white;" class="posName">{{ $candidate->position }}</span>
      <!-- <span style="background-color:white;" class="posName">Select only 1 candidate</span> -->

      <div class="candidates">
        <img src="{{ asset('uploads/image3/'.$candidate->picture) }}">
        <label style="background-color: white;">{{ $candidate->fname }}</label>
        <button type="button">Details</button>
        <input type="checkbox" name="check[]" value="{{ $candidate->vid }}">
      </div>
      @endforeach

    </div>


    <div class="vote">
      <input type="submit" value="Cast Vote" onClick="take_snapshot()">
    </div>
</form>




</section>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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





