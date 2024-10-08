<?php

namespace Database\Seeders;

use App\Models\Repository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepositorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $repoLists = [[
                'hybrid',
                'Laravel-10-Template'
            ],[
                'containers',
                'hybrid',
                'helper',
                'sys_init',
                'docker-compose-up'
            ]];

        foreach ($repoLists as $repoListIndex  => $repoList) {
            foreach ($repoList as $repoIndex => $repo){
                $startUser = Repository::create([
                    'name' => $repo,
                    'account_id' => $repoListIndex + 1 // id von dev und infra
                ]);
            }
        }
    }
}
