<?php

namespace Database\Seeders;

use App\Models\permission;
use App\Models\role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = role::query()->create([
            'title' => 'admin'
        ]);
        $admin->permissions()->attach(permission::all());

        role::query()->insert([
            'title' => 'user'
        ]);
    }
}
