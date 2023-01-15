<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'first_name' => 'Julian',
                'last_name' => 'Niño',
                'identification_card' => '3423598982',
                'email' => 'testing_gml1@yopmail.com',
                'country' => 'Colombia',
                'address' => 'Av 100 #45',
                'cellphone' => '324234230',
                'category_id' => 1,

            ],
            [
                'first_name' => 'Maria',
                'last_name' => 'De las Casas',
                'identification_card' => '659423689',
                'email' => 'testing_gml2@yopmail.com',
                'country' => 'Colombia',
                'address' => 'Carrera 34 #4',
                'cellphone' => '3053423488',
                'category_id' => 2,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
