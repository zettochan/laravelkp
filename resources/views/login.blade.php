<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
</head>
<body>
	<div class="container">
		<h2 class="col-md-6 col-md-offset-5">Đăng nhập</h2>
		<div class="col-md-6 col-md-offset-3">

			@if(Session::has('thatbai'))
				<div class="alert alert-danger">
					{{Session::get('thatbai')}}
				</div>
			@endif

			<form class="form-horizontal" method="POST" action="{{route('dangnhap')}}">

				{{csrf_field()}}
				{{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
				<div class="form-group">
					<label class="control-label col-sm-3">Username </label>
					<div class="col-sm-9">
						<input class="form-control" name="username" placeholder="Enter Username">
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-3">Password</label>
					<div class="col-sm-9">
						<input class="form-control" name="password" type="password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-3">
						<input class="btn btn-primary" value="Login" type="submit">
					</div>
				</div>
			</form>
		</div>
	</div>


</body>
</html>