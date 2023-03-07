<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sprite;

class SpriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sprite::create([
            'description' => 'Pagrindinis',
            'imgIdle' => asset('img/soldier/img/idle.png'),
            'imgRun' => asset('img/soldier/img/begimas.png'),
            'imgJump' => asset('img/soldier/img/jump.png'),
            'imgFall' => asset('img/soldier/img/begimas.png'),
            'imgIdleLeft' => asset('img/soldier/img/idlek.png'),
            'imgRunLeft' => asset('img/soldier/img/begimask.png'),
            'imgJumpLeft' => asset('img/soldier/img/jumpk.png'),
            'imgFallLeft' => asset('img/soldier/img/fallingk.png'),
        ]);
    }
}
