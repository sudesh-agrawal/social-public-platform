<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Social Publishing Platform</title>

	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
	<link href="{{ asset('frontend/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
	<script src="{{ asset('frontend/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
</head>
<body class="">
	<div class="container">
		@yield('content')
	</div>
</body>
</html>