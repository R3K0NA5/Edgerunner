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
            'imgRun' => '../img/soldier/begimas.png',
            'imgJump' => '../img/soldier/jump.png',
            'imgFall' => '../img/soldier/falling.png',
            'imgIdleLeft' => '../img/soldier/idlek.png',
            'imgRunLeft' => '../img/soldier/begimask.png',
            'imgJumpLeft' => '../img/soldier/jumpk.png',
            'imgFallLeft' => '../img/soldier/fallingk.png',
        ]);

        Sprite::create([
            'description' => 'Heat',
            'imgIdle' => '../img/soldier/redidle.png',
            'imgRun' => '../img/soldier/redbegimas.png',
            'imgJump' => '../img/soldier/redjump.png',
            'imgFall' => '../img/soldier/redfalling.png',
            'imgIdleLeft' => '../img/soldier/redidlek.png',
            'imgRunLeft' => '../img/soldier/redbegimask.png',
            'imgJumpLeft' => '../img/soldier/redjumpk.png',
            'imgFallLeft' => '../img/soldier/redfallingk.png',
        ]);

        Sprite::create([
            'description' => 'Frost',
            'imgIdle' => '../img/soldier/blueidle.png',
            'imgRun' => '../img/soldier/bluebegimas.png',
            'imgJump' => '../img/soldier/bluejump.png',
            'imgFall' => '../img/soldier/bluefalling.png',
            'imgIdleLeft' => '../img/soldier/blueidlek.png',
            'imgRunLeft' => '../img/soldier/bluebegimask.png',
            'imgJumpLeft' => '../img/soldier/bluejumpk.png',
            'imgFallLeft' => '../img/soldier/bluefallingk.png',
        ]);

        Sprite::create([
            'description' => 'Ranger',
            'imgIdle' => '../img/soldier/greenidle.png',
            'imgRun' => '../img/soldier/greenbegimas.png',
            'imgJump' => '../img/soldier/greenjump.png',
            'imgFall' => '../img/soldier/greenfalling.png',
            'imgIdleLeft' => '../img/soldier/greenidlek.png',
            'imgRunLeft' => '../img/soldier/greenbegimask.png',
            'imgJumpLeft' => '../img/soldier/greenjumpk.png',
            'imgFallLeft' => '../img/soldier/greenfallingk.png',
        ]);
    }
}

