<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0 ; $i < 20; $i++){
        	$name = $faker->text(50);
            \DB::table('products')->insert([
                'name'  => $name,
                'slug'=>\Illuminate\Support\Str::slug($name),
                'category_id'=>1,
                'origin_price'=>$faker->numberBetween(100000,500000000),
                'sale_price'=>$faker->numberBetween(100000,500000000),
                'content'=>$faker->text('5000'),
                'status'=>1,
                'deleted_at'=>\Carbon\Carbon::now(),
                'created_at'=>\Carbon\Carbon::now(),
        		'updated_at'=>\Carbon\Carbon::now()
            ]);
        }
    }
}
