<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            'dev' => ['name' => 'erth5', 'email' => 'rthem@gmx.de'],
            'infra' => ['name' => 'DockerComposeFiles', 'email' => 'ped5553@gmail.com'],
        ];

        foreach ($accounts as $account) {
            $startUser = Account::create([
                'name' => $account['name'],
                'email' => $account['email'],
                'user_id' => 2
            ]);
        }
    }
}
