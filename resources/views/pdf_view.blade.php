<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>

<body>
     @foreach($employee ?? '' as $key => $data)
    <div>
    	<h4>{{$key}} Image</h4>
        <img src="{{$data}}" width="680" height="400">
    </div>
    <br>
    @endforeach
</body>

</html>