<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'buyer'
        ]);

        Role::create([
            'name' => 'seller'
        ]);

        Role::create([
            'name' => 'admin'
        ]);
    }
}