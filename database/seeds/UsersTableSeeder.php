<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::Create([
    	'name' => 'cashier',
        'email' =>  'cashier@cashier.com',
        'role' => 'cashier',
        'password' => bcrypt('secret')
    	]);
    	User::Create([
    	'name' => 'owner',
        'email' =>  'owner@owner.com',
        'role' => 'owner',
        'password' => bcrypt('secret')
    	]);
    }
}
