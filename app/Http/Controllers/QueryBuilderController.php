<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QueryBuilderController extends Controller
{
    public function getProduct(){
    				//SELECT * FROM products
    	//$products = DB::table('products')->get();
    	//dd($products);
    	//$t_products = DB::table('type_products')->get();
    	//dd($t_products);

    	//SELECT name, unit_price, image FROM products

    	//order by
    	// $products = DB::table('customer')
    	// 			->select('name','gender','address')
    	// 			->orderBy('name','DESC')
    	// 			->get();

    	//SELECT .... FROM products WHERE name like "%crepe%" AND unit_price > 160000
    	//C1
    	/*$products = DB::table('products')
    				->select('name','description','unit_price')
    				->where('name', 'like' , '%crepe%')
    				->where('unit_price', '>' , 160000)
    				->get();*/
    	//C2
    	/*$products = DB::table('products')
    				->select('name','description','unit_price')
    				->where([
    					['name', 'like' , '%crepe%'],
    					['unit_price', '>' , 160000]
    				])
    				->get();*/

    	//C1
    	/*$products = DB::table('products')
    				->select('name','description','unit_price')
    				->where([
    					['unit_price', '>=' , 50000],
    					['unit_price', '<=' , 100000]
    				])
    				->get();*/
    	/*$products = DB::table('products')
    				->select('name','description','unit_price')
    				->whereBetween('unit_price',[50000,100000])
    				->get();*/
    	/*$products = DB::table('products')
    				->select('name','description','unit_price')
    				->where('name','=','Smoke Chicken Pizza')
    				->orWhere('name','=','Bánh Gato Trái cây Việt Quất')
    				->orWhere('name','=','Bánh Táo - Mỹ')
    				->get();*/
    	/*$products = DB::table('products')
    				->select('name','description','unit_price')
    				->whereIn('name',['Smoke Chicken Pizza','Bánh Gato Trái cây Việt Quất','Bánh Táo - Mỹ'])
    				->get();*/
    	/*$products = DB::table('products')
    				->select('name','description','unit_price')
    				->orderBy('unit_price','DESC')
    				->limit(10)
    				->get();*/
    	/*$products = DB::table('products')
    				->select('name','description','unit_price')
    				->orderBy('unit_price','DESC')
    				->offset(60)
    				->limit(10)
    				->get();*/
    	/*$products = DB::table('products')
    				->orderBy('unit_price','DESC')
    				->orderBy('name','ASC')
    				->get();*/
    	/*$products = DB::table('products')
    				->where('name','not like','%Bánh%')
    				->get();*/
    	/*$products = DB::table('products')
    				->selectRaw('avg(unit_price) as dongia_tb')
    				->get();*/
    	$products = DB::table('products')
    				->selectRaw("sum(unit_price)/count(unit_price) as dongia_tb")
    				->get();
    	dd($products);
    }
}
