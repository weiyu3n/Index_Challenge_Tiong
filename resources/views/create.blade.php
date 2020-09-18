<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Index Interview Challenge</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

    <style>

    </style>
</head>

<body>
<div class="container">
    <div class="well" style="margin-top: 16px;">
            @if($errors->has('url'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<strong>Erorr !!! </strong>{{ $errors->first('url') }}
			</div>
			@endif
        <div class="row">
            <form action="{{route('createSubmit')}}" method="post">
                {{ csrf_field() }}
                <div class="col-xs-12 col-sm-4">
                    <p class="title">Name:</p>
                    <input type="text" value="" class="" name="name" required>							
                </div>
                <div class="col-xs-12 col-sm-4">
                    <p class="title">URL:</p>	
                    <input type="text" value="" class="" name="url" required>							
                </div>
                <div class="clearfix"> </div>
                <br>
                <div class="col-xs-12 col-sm-4">
                    <input type="submit" value="Send">
                </div>
            </form>
        </div>
    </div>
</div>
</body>