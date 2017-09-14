<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('products')->insert([
        	'name' => 'Sản phẩm 3',
        	'price' => 20000,
        	'description' => 'Mô tả cho sp 1',
        	'date_create' => '2017/02/02',

        ]);
    }
}
