<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (config()->has('seed.users')) {
            $users = config()->get('seed.users');
            if (!$users) {
                return;
            }

            foreach ($users as $seedUser) {
                $startUser = User::create([
                    'name' => $seedUser['name'],
                    'email' => $seedUser['email'],
                    'email_verified_at' => now(),
                    'password' => bcrypt($seedUser['password']),
                    'abbreviation' => $seedUser['abbreviation'] ?? null,
                ]);

                $roles = $seedUser['roles'];
                if (!empty($roles)) {
                    if (in_array('all', $roles)) {
                        $startUser->assignRole(Role::all());
                    } else {
                        foreach ($roles as $key => $role) {
                            $startUser->assignRole($role);
                        }
                    }
                }
                if (isset($seedUser['softdeleted'])) {
                    $startUser->delete();
                }
                $startUser->saveOrFail();
            }
        }
    }
}
