<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'Admin',
            'profile_image' => 'avatar.png',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $user->attachRole('super_admin');
    }
}
