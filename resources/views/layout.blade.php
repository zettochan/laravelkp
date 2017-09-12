

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Header </h1>

	<div class="container">
	{{-- chứa nội dung bị thay đổi giữa các trang --}}
	
		@yield('content')

		@yield('content_2')

		{{$abc}}

		{{$key}}


	</div>

	<h1>Footer </h1>

</body>
</html>