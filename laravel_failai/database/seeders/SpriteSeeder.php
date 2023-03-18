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
            'description' => 'Private',
            'imgIdle' => '../img/soldier/idle.png',
            'imgRun' => '../img/soldier/begimask.png',
            'imgJump' => '../img/soldier/jumpk.png',
            'imgFall' => '../img/soldier/fallingk.png',
            'imgIdleLeft' => '../img/soldier/idlek.png',
            'imgRunLeft' => '../img/soldier/begimas.png',
            'imgJumpLeft' => '../img/soldier/jump.png',
            'imgFallLeft' => '../img/soldier/falling.png',
        ]);

        Sprite::create([
            'description' => 'Heat',
            'imgIdle' => '../img/soldier/redidle.png',
            'imgRun' => '../img/soldier/redbegimask.png',
            'imgJump' => '../img/soldier/redjumpk.png',
            'imgFall' => '../img/soldier/redfallingk.png',
            'imgIdleLeft' => '../img/soldier/redidlek.png',
            'imgRunLeft' => '../img/soldier/redbegimas.png',
            'imgJumpLeft' => '../img/soldier/redjump.png',
            'imgFallLeft' => '../img/soldier/redfalling.png',
        ]);

        Sprite::create([
            'description' => 'Frost',
            'imgIdle' => '../img/soldier/blueidle.png',
            'imgRun' => '../img/soldier/bluebegimask.png',
            'imgJump' => '../img/soldier/bluejumpk.png',
            'imgFall' => '../img/soldier/bluefallingk.png',
            'imgIdleLeft' => '../img/soldier/blueidlek.png',
            'imgRunLeft' => '../img/soldier/bluebegimas.png',
            'imgJumpLeft' => '../img/soldier/bluejump.png',
            'imgFallLeft' => '../img/soldier/bluefalling.png',
        ]);

        Sprite::create([
            'description' => 'Ranger',
            'imgIdle' => '../img/soldier/greenidle.png',
            'imgRun' => '../img/soldier/greenbegimask.png',
            'imgJump' => '../img/soldier/greenjumpk.png',
            'imgFall' => '../img/soldier/greenfallingk.png',
            'imgIdleLeft' => '../img/soldier/greenidlek.png',
            'imgRunLeft' => '../img/soldier/greenbegimas.png',
            'imgJumpLeft' => '../img/soldier/greenjump.png',
            'imgFallLeft' => '../img/soldier/greenfalling.png',
        ]);
    }
}

