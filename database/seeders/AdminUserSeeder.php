<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->environment("production")) {
            return;
        }

        User::firstOrCreate(
            ["email" => "admin@example.com"],
            [
                "name" => "Admin",
                "password" => Hash::make("password"),
            ],
        );
    }
}
