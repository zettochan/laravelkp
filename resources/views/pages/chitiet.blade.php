@extends('layout')

@section('title')
	Chi tiết
@endsection
@section('content')

	<h1>Đây là trang chi tiết</h1>
	@if(isset($key2))
		{{$key2}}
	@else
		chưa cài đặt giá trị
	@endif

	@for($i=0; $i<10;)
		{{$i++}}
	@endfor
<br>
	<?php

	$arr = ['PHP','iOS','Android', 'Nodejs', 'React'];

	// foreach ($arr as $mon) {
	// 	echo $mon.' ';
	// }

	?>

		@foreach($arr as $monhoc)

			{{-- @continue($monhoc=="Android")  --}}{{-- bỏ qua android --}}
			@if($monhoc!='Android') 
				{{$monhoc}}
				<br>
			@endif

				
		@endforeach

		@foreach($arr as $monhoc)

			@break($monhoc=="Android") {{-- ngừng vòng lặp--}}
				{{$monhoc}}
				<br>
		@endforeach

		@foreach($arr as $monhoc)

			@if($monhoc=='Android') {{-- ngừng vòng lặp--}}
				@break
			@endif
			{{$monhoc}}
			<br>
		@endforeach


	
	
@endsection


