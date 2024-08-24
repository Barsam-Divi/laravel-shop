<?php

namespace Database\Seeders;

use App\Models\role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'role_id' => role::query()->where('title','admin')->first()->id,
            'name' => 'Admin',
            'email' => 'barsam.shafiyi@gmail.com',
            'password' => bcrypt(123456)
        ]);
    }
}
