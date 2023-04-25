<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('loyal_customers')->insert([
            [
                'email' => 'lxc150896@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123'),
            ],
            [
                'email' => 'lxc@gmail.com',
                'role' => 'user',
                'password' => bcrypt('123'),
            ],
            [
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123'),
            ],
        ]);
    }
}
