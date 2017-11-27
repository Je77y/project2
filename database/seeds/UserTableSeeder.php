<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	for ($i = 0; $i < 20; $i++) {
    		User::create([
    			'name' 		=> $faker->firstNameFemale,
    			'email'		=> $faker->email,
    			'password'	=> $faker->password
    		]);
    	}
    }
}
