<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin1',
            'email'=>'admin1@admin.com',
            'password'=>Hash::make('12345'),
            'is_admin'=>1,
            'email_verified_at'=>now()
        ]);

         User::create([
            'name'=>'admin2',
            'email'=>'admin2@admin.com',
            'password'=>Hash::make('12345'),
            'is_admin'=>1,
            'email_verified_at'=>now()
        ]);

         User::create([
            'name'=>'user',
            'email'=>'user@user.com',
            'password'=>Hash::make('12345'),
            'is_admin'=>0,
            'email_verified_at'=>now()
        ]);
    }
}
