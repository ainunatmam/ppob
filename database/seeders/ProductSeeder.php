<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
        	[
        		'title' => 'BPJS Kesehatan 1 Bulan',
        		'category_id' => 11,
        		'deposit' => 50000000.00,
        		'price' => 150000.00
        	],
        	[
        		'title' => 'Paket Data 1GB Unlimited M3',
        		'category_id' => 10,
        		'deposit' => 1000000.00,
        		'price' => 25000.00
        	],
        	[
        		'title' => 'Pascabayar Telkomsel',
        		'category_id' => 3,
        		'deposit' => 50000000.00,
        		'price' => 150000.00
        	],
        	[
        		'title' => 'PDAM',
        		'category_id' => 8,
        		'deposit' => 50000000.00,
        		'price' => 200000.00
        	],
        	[
        		'title' => 'PLN Prabayar',
        		'category_id' => 11,
        		'deposit' => 10000000.00,
        		'price' => 100000.00
        	],
        	[
        		'title' => 'PLN Pascabayar',
        		'category_id' => 11,
        		'deposit' => 10000000.00,
        		'price' => 123000.00
        	]
        ]);
    }
}
