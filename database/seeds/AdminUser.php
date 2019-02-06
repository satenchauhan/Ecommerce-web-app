<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
        	'role'    => 'admin',
        	'username'=> 'Raman Kumar',
        	'email'   => 'raman@gmail.com',
        	'password'=> Hash::make(123456),

        ]);
    }
}
