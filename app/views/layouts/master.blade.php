<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="/css/device_responsive.css">
	<link rel="stylesheet" type="text/css" href="/css/navbar-fixed-top.css">
	<link rel="stylesheet" type="text/css" href="/css/sticky-footer.css">
	<link rel="stylesheet" type="text/css" href="/css/font-awesome.css">

    <title>Laravel Blog</title>

    @yield('top-script')

</head>
<body class="container text-center">
	
	@include('layouts.partials.navbar')

	@if (Session::has('successMessage'))
    	<div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
	@endif
	@if (Session::has('errorMessage'))
    	<div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
	@endif
    
    @yield('content')


	<script   src="https://code.jquery.com/jquery-2.2.3.js"   integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4="   crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<script>
setTimeout(function(){
	$(".alert").slideUp(900);
}, 500);

</script>
	@yield('bottom-script')

	@if(Auth::check())
		@include('layouts.partials.footer')
	@endif
</body>
</html>
