<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('couriers')->insert([
            'courier_name' => 'JNE',
            'courier_price' => '20000'
        ]);
        DB::table('couriers')->insert([
            'courier_name' => 'JNE',
            'courier_price' => '30000'
        ]);
        DB::table('couriers')->insert([
            'courier_name' => 'JNE',
            'courier_price' => '35000'
        ]);
        DB::table('couriers')->insert([
            'courier_name' => 'JNE',
            'courier_price' => '10000'
        ]);
        DB::table('couriers')->insert([
        'courier_name' => 'TIKI',
        'courier_price' => '10000'
        ]);
        DB::table('couriers')->insert([
            'courier_name' => 'TIKI',
            'courier_price' => '20000'
        ]);
        DB::table('couriers')->insert([
            'courier_name' => 'TIKI',
            'courier_price' => '30000'
        ]);
    }
}
