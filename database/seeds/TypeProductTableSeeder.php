<?php

use Illuminate\Database\Seeder;

class TypeProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i=1;$i<=10;$i++){
    		DB::table('type_product')->insert([
	        	'name' => "Loại sản phẩm $i",
	        	'description' => "Mô tả cho loại sp $i"
	        ]);
    	}

        
    }
}
