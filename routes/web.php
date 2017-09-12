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

/*Route::get('/trangchu', function () {
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


*/

Route::get('','PageController@getTrangchu');


Route::get('chitiet','PageController@getChitiet');

Route::get('tao-bang-san-pham',function(){
	Schema::create('products',function($table){
		$table->increments('id');
		$table->string('name');
		$table->float('price');
		$table->text('description');
		$table->date('date_create');
		$table->timestamps();
	});
	echo 'tạo bảng thành công';
});

Route::get('tao-bang-loai-san-pham',function(){
	Schema::create('type_products',function($table){
		$table->increments('id');
		$table->string('name')->default('Tên loại');
		$table->text('description');
		$table->timestamps();
	});
	echo 'tạo bảng thành công';
});


Route::get('them-cot-bang-products',function(){
	Schema::table('products',function($table){
		$table->integer('id_type')->unsigned();
		$table->foreign('id_type')->references('id')->on('type_products');
	});
	echo 'updated';
});

Route::get('remove-column',function(){
	Schema::table('products',function($table){
		$table->dropColumn('date_create');
	});
	echo 'deleted';
});

Route::get('rename-column',function(){
	Schema::table('products', function ( $table) {
	    $table->renameColumn('price', 'unit_price'); 
	});
	echo 'updated';
});

Route::get('rename-table',function(){

	Schema::rename('products', 'sanpham');
	echo 'updated';
});


Route::get('change-column',function(){
	Schema::table('sanpham',function($table){
		$table->string('description')->change();
	});
	echo 'updated';
});