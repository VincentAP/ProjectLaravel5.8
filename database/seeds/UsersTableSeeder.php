<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nameregister' => 'Vincent Ardyan Putra',
                'product_image' => 'aconite.jpg',
                'emailregister' => 'ardyanputra.vincent@yahoo.co.id',
                'passregister' => bcrypt('admin'),
                'phoneregister' => '081350400648',
                'gender' => 'male',
                'address' => 'sdkfjsdkfnsjfksnjfksnjk',
                'role'  => 'admin'
            ],
            [
                'nameregister' => 'Kevin Kurniawan',
                'product_image' => 'aconite.jpg',
                'emailregister' => 'vinkriskk@yahoo.co.id',
                'passregister' => bcrypt('admin'),
                'phoneregister' => '081354678945',
                'gender' => 'male',
                'address' => 'sdkfjsdkfnsjfksnjfksnjk',
                'role'  => 'admin'
            ],
            [
                'nameregister' => 'Kelvin Supranata Wangkasa',
                'product_image' => 'aconite.jpg',
                'emailregister' => 'kelvinswr99@gmail.com',
                'passregister' => bcrypt('admin'),
                'phoneregister' => '082387803658',
                'gender' => 'male',
                'address' => 'sdkfjsdkfnsjfksnjfksnjk',
                'role'  => 'admin'
            ],
            [
                'nameregister' => 'Johan',
                'product_image' => 'aconite.jpg',
                'emailregister' => 'johan@gmail.com',
                'passregister' => bcrypt('user'),
                'phoneregister' => '082387803658',
                'gender' => 'male',
                'address' => 'sdkfjsdkfnsjfksnjfksnjk',
                'role'  => 'user'
            ]
        ]);
    }
}
