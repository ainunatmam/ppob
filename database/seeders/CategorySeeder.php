<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
        	[
        		'title' => 'internet-telkom-mp',
        		'admin_fee' => 2500
        	],
        	[
        		'title' => 'multifinance-postpaid-mp',
        		'admin_fee' => 2000
        	],
        	[
        		'title' => 'pulsa-postpaid-mp',
        		'admin_fee' => 2500
        	],
        	[
        		'title' => 'shopeepay-emoney-mp',
        		'admin_fee' => 2000
        	],
        	[
        		'title' => 'esamsat-postpaid-mp',
        		'admin_fee' => 2000
        	],
        	[
        		'title' => 'dana-emoney-mp',
        		'admin_fee' => 2000
        	],
        	[
        		'title' => 'linkaja-emoney-mp',
        		'admin_fee' => 2000
        	],
        	[
        		'title' => 'pdam-postpaid-mp',
        		'admin_fee' => 2500
        	],
        	[
        		'title' => 'etoll-prepaid-mp',
        		'admin_fee' => 2000
        	],
        	[
        		'title' => 'pulsa-paketdata-mp',
        		'admin_fee' => 2500
        	],
        	[
        		'title' => 'bpjs-kesehatan-mp',
        		'admin_fee' => 2000
        	],
        	[
        		'title' => 'pln-postpaid-mp',
        		'admin_fee' => 3000
        	],
        	[
        		'title' => 'gopay-emoney-mp',
        		'admin_fee' => 2000
        	],
        	[
        		'title' => 'pln-prepaid-mp',
        		'admin_fee' => 3000
        	],
        	[
        		'title' => 'ovo-emoney-mp',
        		'admin_fee' => 2000
        	],
        	[
        		'title' => 'pbb-postpaid-mp',
        		'admin_fee' => 2000
        	],
        	[
        		'title' => 'internet-nontelkom-mp',
        		'admin_fee' => 2500
        	],
        	[
        		'title' => 'pulsa-prepaid-mp',
        		'admin_fee' => 3000
        	],
        ]);
    }
}
