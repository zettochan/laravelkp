<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Upload</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="{{route('uploadfile')}}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="file" name="image[]" multiple>
		<button type="submit">Upload</button>
	</form>
</body>
</html>