<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Rian Feriana',
            'username' => 'Rian',
            'password' => bcrypt('rian1345'),
            'email' => 'rianbloger2@gmail.com'
        ]);
        
    }
}