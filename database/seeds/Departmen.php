<?php

use Illuminate\Database\Seeder;

class Departmen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departmens')->insert([
	        'nama'  => 'Bidang Pemasaran Bisnis 1'
		]);

		DB::table('departmens')->insert([
	        'nama'  => 'Bidang Pemasaran Bisnis 2'
		]);

		DB::table('departmens')->insert([
	        'nama'  => 'Penjualan Funding'
		]);

		DB::table('departmens')->insert([
	        'nama'  => 'Bidang Nasabah'
		]);

		DB::table('departmens')->insert([
	        'nama'  => 'Penjualan Lending'
		]);
    }
}
