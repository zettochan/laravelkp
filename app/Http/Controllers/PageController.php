<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	public function getHomePage(){
		echo 'đây là trang chủ';
		echo 3232;
	}

	public function getDetail(Request $request){
		$ten =  $request->name;
		$maso =  $request->id;
		// echo 'đây là trang detail';
		// echo 3232;

		//C1
		//return view('hello',['name'=>$ten, 'maso'=>$maso]);
		//C2
		return view('hello',compact('ten','maso'));
	}



	/*public function getDetail($id,$name){ //chú ý vị trí của các tham số trên route (đã hoán đổi vị trí)
		echo $name;
		echo '<br>';
		echo $id;

		//huong
		//3

		//3
		//huong

	}*/
}
