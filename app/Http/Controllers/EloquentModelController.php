<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Customer;
use App\TypeProducts;

class EloquentModelController extends Controller
{
    public function getProduct(){

    	//$products = Products::get();
    	/*$products = Customer::select('name','gender','address')
    				->orderBy('name','DESC')
    				->get();*/

    	$products = Products::join('type_products', function($join){
                        $join->on('products.id_type', '=', 'type_products.id');
                    })
                    ->selectRaw('type_products.name as TenLoai, sum(unit_price) TongGiaTien, count(products.id) as tongSP')
                    ->groupBy('type_products.name')
                    //->whereBetween('unit_price',[50000,100000])
                    ->orderBy('TongGiaTien', 'ASC')
                    ->get();
    	//dd($products);

        foreach($products as $sanpham){
        	echo $sanpham->TenLoai .' - ' . $sanpham->TongGiaTien;
        	echo '<br>';
        }
    }



    public function getProduct_relation(){
        $type_products = TypeProducts::with('Products','BillDetail')->get();
        //dd($type_products);
        foreach($type_products as $loaisp){
                echo "<b>".$loaisp->name.":</b>";
                echo "<br>"; 
                foreach($loaisp->Products as $sanpham){
                    echo '- '.$sanpham->name . ': '. $sanpham->unit_price;
                    echo "<br>"; 
                }
                echo '---------------------------------------';
                echo "<br>"; 
                foreach($loaisp->BillDetail as $hoadon){
                    echo '- '.$hoadon->id_product . ': '. $hoadon->id_bill;
                    echo "<br>"; 
                }
                echo '<hr>';
        }
    }
}
