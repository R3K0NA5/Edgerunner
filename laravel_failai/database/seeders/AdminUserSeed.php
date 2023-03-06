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
        $user = User::firstOrCreate(
            [
                'email' => 'admin@example.com',
            ],
            [
                'name' => 'Admin',
                'password' => bcrypt('admin'),
            ],
            [
            'sprite_id' => '1',
            ],
        );

    }
}
