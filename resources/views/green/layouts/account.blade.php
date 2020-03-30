<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="{{asset('front3/css/normalize.css')}}">
		<link rel="stylesheet" href="{{asset('front3/css/bootstrap-grid.css')}}">
		<link rel="stylesheet" href="{{asset('front3/css/media.css')}}">
		<title>{{__('Личный кабинет')}}</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
	</head>

	<body>

	@yield('content')

		<script type="text/javascript">
			$('#chooseFile').bind('change', function () {
			  	var filename = $("#chooseFile").val();
			  	if (/^\s*$/.test(filename)) {
			    	$(".file-upload").removeClass('active');
			    	$("#noFile").text("No file chosen..."); 
			  	}
			  	else {
			    	$(".file-upload").addClass('active');
			    	$("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
			  	}
			});
		</script>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>
		<script src="{{asset('front3/js/script.js')}}"></script>
		<script src="{{asset('front3/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('front3/js/script.js')}}"></script>
	</body>	
</html>