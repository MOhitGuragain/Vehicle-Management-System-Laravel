<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create admin role if not exists
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Assign to test user
        $user = User::where('email', 'test@example.com')->first(); // change email to your test user
        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
