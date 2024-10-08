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
            'erth5',
            'DockerComposeFiles'
        ];

        foreach ($accounts as $account) {
            $startUser = Account::create([
                'name' => $account,
                'user_id' => 2
            ]);
        }
    }
}
