<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	@foreach ($candidate as $item)
  <h1>{{ $item->position }}</h1>
  <ul>
    @foreach ($item as $subitem)
      <li>{{ $subitem }}</li>
   
    @endforeach
  </ul>
@endforeach


</body>
</html>