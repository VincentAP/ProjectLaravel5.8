<?php

use Illuminate\Database\Seeder;

class FlowerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('flower_types')->insert([
            ['flower_type' => 'Rose'],
            ['flower_type' => 'Azalea'],
            ['flower_type' => 'Lily']
        ]);
    }
}
