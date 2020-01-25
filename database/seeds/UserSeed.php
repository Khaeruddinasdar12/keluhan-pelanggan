<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
	        'name'  => 'Angelica Akiang',
	        'email' => 'angelica@gmail.com',
	        'password'  => bcrypt('12345678')
		]);
    }
}
