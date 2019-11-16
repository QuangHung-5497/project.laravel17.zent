<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name'  => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'is_admin' => 1,
            'deleted_at'=>\Carbon\Carbon::now(),
            'created_at'=>\Carbon\Carbon::now(),
        	'updated_at'=>\Carbon\Carbon::now()

        ]);
        $faker = \Faker\Factory::create();
        for ($i = 0 ; $i < 20; $i++){
            \DB::table('users')->insert([
                'name'  => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                 'is_admin' => 0,
                'deleted_at'=>\Carbon\Carbon::now(),
                'created_at'=>\Carbon\Carbon::now(),
        		'updated_at'=>\Carbon\Carbon::now()

            ]);
        }
    }
}
