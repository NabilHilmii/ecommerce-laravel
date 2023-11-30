<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserData =[
            ['name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345678'),
            'address'=>'Kantor',
            'phone'=>'123',
            'role'=>'Admin',
        ],
        [
            'name'=>'User',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('12345678'),
            'address'=>'Rumah',
            'phone'=>'123',
            'role'=>'User',
        ],
    ];
    foreach($UserData as $key => $val){
        User::create($val);
    }
    }
}
