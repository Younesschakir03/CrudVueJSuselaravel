<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
            'name' => 'chakir Youness',
            'email' => 'chakir.chakir@yahoo.com',
            'password' => bcrypt('12345678'),           
        ]);
    }
}