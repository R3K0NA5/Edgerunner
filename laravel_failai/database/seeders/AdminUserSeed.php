<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@example.com',
            ],
            [
                'name' => 'Admin',
                'password' => bcrypt('admin'),
                'sprite_id' => '1',
                'alg' => '1',
                'role' => 'admin',
            ]
        );

        $recon = User::firstOrCreate(
            [
                'email' => 'recon@recon.com',
            ],
            [
                'name' => 'Recon',
                'password' => bcrypt('recon'),
                'sprite_id' => '1',
                'alg' => '1',
                'role' => 'user',
            ]
        );
    }
}
