<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/trangchu', function () {
    return view('welcome');
})->name('homepage');


Route::get('', function(){
	echo 'Hello World!';
});

Route::get('loaisp', function(){
	echo 234567;
});



//id là tham số theo pt get
Route::get('chitiet/{id?}/{name?}', function($ma_sp = 1){
	echo 'Đây là trang chi tiết sản phẩm';
	echo '<br>';
	echo $ma_sp;
})
->where('id','[0-9]+')
->where('name','[a-z]+')//where: giới hạn giá trị cho tham số
->name('detail'); //đặt tên cho route
 




// Route::match(['get','post'],'login',function(){
	


// });


Route::group(['prefix'=>'admin'],function(){

	// admin/trangchu
	Route::get('trangchu',function(){
		echo 'đây là trangchu của admin';
	});

	// admin/home
	Route::get('home',function(){
		echo 'đây là home page của admin';
	});



});


Route::get('home','PageController@getHomePage');
Route::get('chi-tiet/{name}/{id}','PageController@getDetail');

Route::get('login',[
	'as' => 'dangnhap', //tên route
	'uses' => 'PageController@getLogin' //gọi controller
]);

Route::post('login',[
	'as' => 'dangnhap',
	'uses' => 'PageController@postLogin'
]);


Route::get('setcookie','PageController@setCookie');
Route::get('getcookie','PageController@getCookie');


Route::get('test-session','PageController@testSession');