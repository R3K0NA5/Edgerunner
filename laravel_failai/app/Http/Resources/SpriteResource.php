<?php

namespace App\Http\Resources;



use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'imageSrc' => $this->imgIdle,
            'animations' => [
                'Idle' => [
                    'imageSrc' => $this->imgIdle,
                    'frameRate' => 8,
                    'frameBuffer' => 200,
                ],
                'Run' => [
                    'imageSrc' => $this->imgRun,
                    'frameRate' => 8,
                    'frameBuffer' => 12,
                ],
                'Jump' => [
                    'imageSrc' => $this->imgJump,
                    'frameRate' => 8,
                    'frameBuffer' => 200,
                ],
                'Fall' => [
                    'imageSrc' => $this->imgFall,
                    'frameRate' => 8,
                    'frameBuffer' => 200,
                ],
                'FallLeft' => [
                    'imageSrc' => $this->imgFallLeft,
                    'frameRate' => 8,
                    'frameBuffer' => 200,
                ],
                'RunLeft' => [
                    'imageSrc' => $this->imgRunLeft,
                    'frameRate' => 8,
                    'frameBuffer' => 12,
                ],
                'IdleLeft' => [
                    'imageSrc' => $this->imgIdleLeft,
                    'frameRate' => 8,
                    'frameBuffer' => 200,
                ],
                'JumpLeft' => [
                    'imageSrc' => $this->imgJumpLeft,
                    'frameRate' => 8,
                    'frameBuffer' => 200,
                ],
            ],
        ];
    }
}


//namespace App\Http\Resources;
//
//use Illuminate\Http\Request;
//use Illuminate\Http\Resources\Json\JsonResource;
//
//class SpriteResource extends JsonResource
//{
//    /**
//     * Transform the resource into an array.
//     *
//     * @return array<string, mixed>
//     */
//    public function toArray(Request $request): array
//    {
//        return [
//            100,
//            700,
//            $this->imgIdle,
//            [
//                'Idle' => [
//                    'imageSrc' => $this->imgIdle,
//                    'frameRate' => 8,
//                    'frameBuffer' => 200,
//                ],
//                'Run' => [
//                    'imageSrc' => $this->imgIdle,
//                    'frameRate' => 8,
//                    'frameBuffer' => 12,
//                ],
//                'Jump' => [
//                    'imageSrc' => $this->imgIdle,
//                    'frameRate' => 8,
//                    'frameBuffer' => 200,
//                ],
//                'Fall' => [
//                    'imageSrc' => $this->imgIdle,
//                    'frameRate' => 8,
//                    'frameBuffer' => 200,
//                ],
//                'FallLeft' => [
//                    'imageSrc' => $this->imgIdle,
//                    'frameRate' => 8,
//                    'frameBuffer' => 200,
//                ],
//                'RunLeft' => [
//                    'imageSrc' => $this->imgIdle,
//                    'frameRate' => 8,
//                    'frameBuffer' => 12,
//                ],
//                'IdleLeft' => [
//                    'imageSrc' => $this->imgIdle,
//                    'frameRate' => 8,
//                    'frameBuffer' => 200,
//                ],
//                'JumpLeft' => [
//                    'imageSrc' => $this->imgIdle,
//                    'frameRate' => 8,
//                    'frameBuffer' => 200,
//                ],
//            ]
//        ];
//    }
//}

