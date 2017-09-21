<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QueryBuilderController extends Controller
{
    public function getProduct(){
    				//SELECT * FROM products
    	/*$products = DB::table('products')->get();
    	dd($products);*/
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
    	/*$products = DB::table('products')
    				->selectRaw("sum(unit_price)/count(unit_price) as dongia_tb")
    				->get();*/

        //select 'type_products.name as TenLoai', 'products.name as TenSP', 'unit_price' FROM products INNER JOIN type_products ON 'products.id_type', '=', 'type_products.id' WHERE type_products.id = 1
        //C1     
        /*$products = DB::table('products')
                    ->join('type_products','products.id_type', '=', 'type_products.id')
                    ->select('type_products.name as TenLoai', 'products.name as TenSP', 'unit_price')
                    ->where('type_products.id' ,1)
                    ->get();*/
        //C2
        /*$products = DB::table('products')
                    ->join('type_products', function($join){
                        $join->on('products.id_type', '=', 'type_products.id');
                        $join->where('type_products.id' ,1);
                    })
                    ->select('type_products.name as TenLoai', 'products.name as TenSP', 'unit_price')
                    ->get();*/

        //SELECT type_products.name as TenLoai, count(products.id) as TongSP FROM products INNER JOIN type_products ON 'products.id_type', '=', 'type_products.id' GROUP BY type_products.name

        /*$products = DB::table('products')
                    ->join('type_products', function($join){
                        $join->on('products.id_type', '=', 'type_products.id');
                    })
                    ->selectRaw('type_products.name as TenLoai, count(products.id) as TongSP')
                    ->groupBy('type_products.name')
                    ->orderBy('TongSP', 'ASC')
                    ->get();*/
        /*$products = DB::table('products')
                    ->join('type_products', function($join){
                        $join->on('products.id_type', '=', 'type_products.id');
                    })
                    ->selectRaw('type_products.name as TenLoai, sum(unit_price)/count(products.id) as DGTB')
                    ->where('type_products.name','like', '%Bánh ngọt%')
                    ->groupBy('type_products.name')
                    ->orderBy('DGTB', 'ASC')
                    ->get();
        dd($products);*/
        /*$products = DB::table('products')
                    ->join('type_products', function($join){
                        $join->on('products.id_type', '=', 'type_products.id');
                    })
                    ->selectRaw('type_products.name as TenLoai, min(unit_price) MIN')
                    ->groupBy('type_products.name')
                    ->orderBy('MIN', 'ASC')
                    ->get();*/


        //SELECT type_products.name as TenLoai, sum(unit_price) TongGiaTien, count(products.id) as TongSP FROM products INNER JOIN type_products ON products.id_type = type_products.id GROUP BY type_products.name WHERE id between 50000 and 100000 

        $products = DB::table('products')
                    ->join('type_products', function($join){
                        $join->on('products.id_type', '=', 'type_products.id');
                    })
                    ->selectRaw('type_products.name as TenLoai, sum(unit_price) TongGiaTien, count(products.id) as tongSP')
                    ->groupBy('type_products.name')
                   // ->whereBetween('unit_price',[50000,100000])
                    ->orderBy('TongGiaTien', 'ASC')
                    ->get();
    	foreach($products as $sanpham){
            echo $sanpham->TenLoai;
            echo '<br>';
        }

       /* $bill = DB::table('bills')
                ->join('bill_detail',function($join){
                    $join->on('bills.id','=','bill_detail.id_bill');
                })
                ->selectRaw('bills.id as SOHD, date_order, total, count(id_product) as TongSP')
                ->groupBy('SOHD','date_order','total')
                ->get();
        dd($bill);*/
    }
}
