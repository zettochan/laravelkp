<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

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


	// public function getLogin(){
	// 	return view('login');
	// }


	// public function postLogin(Request $request){
	// 	$un = $request->username;
	// 	$pw = $request->password;
	// 	if($un == "admin" && $pw == '111111'){
	// 		//đăng nhập thành công
	// 		return redirect()->route('homepage')->with('thanhcong','Login Thành công');
	// 	}
	// 	else{
	// 		//fail
	// 		//return redirect()->route('dangnhap');
	// 		return redirect()->back()->with('thatbai','Sai thông tin đăng nhập');
	// 	}

	// }


	public function setCookie(){
		$res = new Response;
		$res->withCookie('khoahoc','Laravel', 1);
		echo 'setup cookie ';
		return $res;
	}

	public function getCookie(Request $req){
		echo $req->cookie('khoahoc');
	}


	public function testSession(){

		//tạo session
		session()->put('thanh_cong','Đã tạo session thành công');
		session()->put('that_bai','Đã tạo session thất bại');

		//xóa toàn bộ session_destroy()
		session()->flush();

		//xóa session thanh_cong unset()
		session()->forget('thanh_cong');

		echo session('thanh_cong');
		echo session('that_bai');




	}


	public function getTrangchu(){
		$abc = 'giá trị';
		return view('pages.trangchu',compact('abc'));
	}

	public function getChitiet(){

		$abc = 'giá trị';
		return view('pages.chitiet',compact('abc'));
	}


	public function getLogin(){
		return view('login');
	}

	public function postLogin(Request $req){
	
		// $req->validate([
		// 	'email' => 'required|email',
		// 	'password' => 'required|min:6|max:20'
		// ]);
		$this->validate($req,
			[
				'email' => 'required|email',
				'password' => 'required|min:4|max:20'
			],
			[
				'email.required' => 'Vui lòng nhập email',
				'email.email'    => 'Email không đúng định dạng',
				'password.required' => 'Mật khẩu không được rỗng',
				'password.min' => 'Mật khẩu ít nhất 4 kí tự',
				'password.max' => 'Mật khẩu ko vượt quá 20 kí tự'
			]
		);

		$email = $req->email;
		$password = $req->password;

		$info = array('email'=>$email, 'password'=>$password);
		//dd(Auth::attempt($info));
		if(Auth::attempt($info)){
			return redirect()->route('homepage');
		}
		return redirect()->back()->with('thatbai','Sai thông tin đăng nhập');
	}

	public function getFormUpload(){
		return view('uploadfile');
	}

	public function postUpload(Request $req){
		if($req->hasFile('image')){

			$images = $req->file('image');

			$arrExt = ['docx','doc','ppt','pptx','xlsx','xls','jpg'];

			foreach ($images as $image) {
				$size = $image->getClientSize();
				if($size>2048){//1024*2

					$ext = $image->getClientOriginalExtension();

					if(in_array($ext, $arrExt)){
						$name = $image->getClientOriginalName();
						$newName = time().'-'.$name;
						$image->move('images/',$newName);
						
						echo 'File được lưu ở images/'.$newName;
					}
					else{
						echo 'file ko được phép';
					}
					
				}
				else{
					echo 'File quá lớn';
				}
			}
			
			


			// if($image->isValid()){
			// 	dd($name);
			// }
			// else{
			// 	echo 'fail';
			// }

		}
	}
}
