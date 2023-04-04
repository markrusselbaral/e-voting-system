<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Result</title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
	
			
				
</head>

	<style>
		table {
		   border-collapse: collapse;
 		   width: 100%;
  		   margin: 0 auto;
		}

		th,
		td {
		  text-align: left;
		  padding: 8px;
		  border-bottom: 1px solid #ddd;
		}

		th {
		  background-color: #000;
		  color: #fff;
		}

		tbody tr:nth-child(even) {
		  background-color: #f2f2f2;
		}

	</style>


<body>
	<span style="font-weight: bold; font-size: 1.5rem; padding-bottom: 2rem;">
		SSG ELECTION RESULTS
	</span>
	<table>
	  <thead>
	    <tr>
	      <th>Position</th>
	      <th>Name</th>
	      <th>Vote Count</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($votes as $value)
	  		@foreach($value->votes as $vote)
	    <tr>
	      <td>{{ $value->position }}</td>
	      <td>{{ $vote->fname }} {{ $vote->lname }}</td>
	      <td>{{ $vote->votecount }}</td>
	    </tr>
	    	@endforeach
	    @endforeach
	  </tbody>
	</table>

</body>
</html>