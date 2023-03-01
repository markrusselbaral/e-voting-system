<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Result</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	
			
				<style>
					@foreach($votes as $value)
					@foreach (range(1,$value->position_order) as $number)

						tbody .position{{ $value->id }}{{ $value->position_order }}:nth-child({{$number}})
						{
								background-color: green;
								
						}

					@endforeach
					@endforeach
				</style>
</head>
<body>

	<div style="display: flex; justify-content: center; align-items: center; margin-top: 6rem; flex-direction: column; gap: 2rem;">
		<span style="font-size: 1.3em; font-weight: bold;">SSG ELECTION 2023 RESULTS</span>
		<table class="table table-striped" style="width: 80%;">
			<thead class="thead-dark">
				<tr class="table-dark">
					<th scope="col">Position</th>
					<th scope="col">Name</th>
					<th scope="col">Vote Count</th>
				</tr>
			</thead> 
			<tbody>
				@foreach($votes as $value)
					@foreach($value->votes as $vote)
					<tr class="position{{ $value->id }}{{ $value->position_order }}">
						<td>{{ $value->position }}</td>
						<td>{{ $vote->fname }} {{ $vote->lname }}</td> 
						<td>{{ $vote->votecount }}</td>  
					</tr>
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>