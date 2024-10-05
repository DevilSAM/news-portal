<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'ADMIN',
                'email' => 'admin@admin.ru',
                'password' => Hash::make('password') ,
                'verification_code' => 123456,
                'is_verified' => 1,
            ],
        ];
        User::upsert(
            $data,
            [ 'name' ],
            [ 'name', 'email', 'password', 'verification_code', 'is_verified' ],
        );
    }
}
