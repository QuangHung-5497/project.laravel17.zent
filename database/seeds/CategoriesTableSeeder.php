<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	'Máy ảnh',
        	'Điện thoại',
        	'Phụ kiện',
        	'Máy tính'

        ];
        foreach ($categories as $category) {
        	\Illuminate\Support\Facades\DB::table('categories')->insert([
        		'name'=>$category,
        		'slug'=>\Illuminate\Support\Str::slug($category),
        		'parent_id'=>1,
        		'deleted_at'=>\Carbon\Carbon::now(),
        		'created_at'=>\Carbon\Carbon::now(),
        		'updated_at'=>\Carbon\Carbon::now()
        	]);
        }
    }
}
