<!DOCTYPE html>
<html lang="en">
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('css')

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		@include('fontend.includes.header')
		
		<!-- Menu -->

		@include('fontend.includes.content')

	<!-- Newsletter -->

		@include('fontend.includes.footer')
</div>

@yield('js')
</body>

</html>