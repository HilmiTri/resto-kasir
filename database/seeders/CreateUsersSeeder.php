<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'username'=>'Admin',
                'email'=>'admin@its.com',
                'role'=>'admin',
                'password'=> Hash::make('12341234'),
            ],
            [
                'name'=>'Manager',
                'username'=>'Manager',
                'email'=>'manager@its.com',
                'role'=>'manager',
                'password'=> Hash::make('12341234'),
            ],
            [
                'name'=>'Cashier',
                'username'=>'Cashier',
                'email'=>'cashier@its.com',
                'role'=>'cashier',
                'password'=> Hash::make('12341234'),
            ],
        ];
  
        foreach($user as $value) {
            User::create($value);
        }
    }
}
