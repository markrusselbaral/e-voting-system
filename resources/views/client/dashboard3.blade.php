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


      <!-- Modal -->
                <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="img-candidates" style="margin-bottom: 2rem;">
                            <img src="" style="width: 100px;" id="candidate-picture">
                        </div>
                        <div class="img-candidates">
                            <label style="font-size: .8rem">Fullname</label>
                            <p style="font-weight: bold; font-size: 1.3rem;" id="fullname"></p>
                        </div>
                        <div class="img-candidates">
                            <label style="font-size: .8rem">Position</label>
                            <p style="font-weight: bold; font-size: 1.3rem;" id="position"></p>
                        </div>
                        <div class="img-candidates">
                            <label style="font-size: .8rem">Party</label>
                            <p style="font-weight: bold; font-size: 1.3rem;" id="partylists"></p>
                        </div>
                        <div class="img-candidates">
                            <label style="font-size: .8rem">Course & Section</label>
                            <p style="font-weight: bold; font-size: 1.3rem;" id="course_sections"></p>
                        </div>
                         <div class="img-candidates">
                            <label style="font-size: .8rem">Department</label>
                            <p style="font-weight: bold; font-size: 1.3rem;" id="departments"></p>
                        </div>
                         <div class="img-candidates">
                            <label style="font-size: .8rem">College</label>
                            <p style="font-weight: bold; font-size: 1.3rem;" id="colleges"></p>
                        </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

@foreach($candidates as $candidate)
    <div class="container" style="background-color: white;">
              <span style="font-size: 1.5em;background-color: white;" class="posName">{{ $candidate->position }}</span>
              Select only {{ $candidate->position_order }} candidate(s)
              
              @foreach($candidate->candidate as $value)
              <div class="candidates">
                <img src="{{ asset('uploads/image3/'.$value->picture) }}">
                <label style="background-color: white;">{{ $value->fname }}</label>
                <button type="button" class="editbtn" value="{{ $value->id }}">Details</button>

                <input type="checkbox" name="check[]" value="{{ $value->id }}" class="{{ $value->id }}">
                <input type="checkbox" name="position[]" value="{{ $value->position_id }}" class="{{ $value->id }}" hidden>
                <!-- <input type="text" name="check[]" value="{{ $value->id }}"> -->

              </div>
              @endforeach
    </div>
 @endforeach

    <div class="vote">
      <input type="submit" value="Cast Vote" onClick="take_snapshot()">
    </div>
</form>




</section>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.24/webcam.js"></script>
<!-- <script>
  var seen = {};
  $('.posName').each(function(){
    var txt = $(this).text();
    if(seen[txt])
      $(this).remove();
    else
      seen[txt] = true;
  });
</script> -->

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

@include('admin.includes.voters-show-modal')
</body>
</html>





