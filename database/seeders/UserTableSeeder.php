<?php
         namespace Database\Seeders;

	     use App\Models\User; 
	     use Illuminate\Database\Seeder;
	     
	     class UserTableSeeder extends Seeder

	     {
	         /**
	          * Run the database seeds.
	          *
	          * @return void
	          */
	         public function run()
	         {
	            User::create([
	            'name' => 'Mr. Junk',
	            'email' => 'superadmin@gmail.com',
	            'password' => bcrypt('supersecret'),
	         ]);
	            User::create([
	            'name' => 'Mr. Junk',
	            'email' => 'admin@gmail.com',
	            'password' => bcrypt('secret'),
	         ]);
	         }
	    } 
