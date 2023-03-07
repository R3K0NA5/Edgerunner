<?php

namespace App\Http\Resources;



use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SpriteResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array
     */
    public function toArray($request)
    {
        return collect($this->collection)->map(function ($sprite) {
            return [
                'id' => $sprite->id,
                'imageSrc' => $sprite->imgIdle,
                'animations' => [
                    'Idle' => [
                        'imageSrc' => $sprite->imgIdle,
                        'frameRate' => 8,
                        'frameBuffer' => 200,
                    ],
                    'Run' => [
                        'imageSrc' => $sprite->imgIdle,
                        'frameRate' => 8,
                        'frameBuffer' => 12,
                    ],
                    'Jump' => [
                        'imageSrc' => $sprite->imgIdle,
                        'frameRate' => 8,
                        'frameBuffer' => 200,
                    ],
                    'Fall' => [
                        'imageSrc' => $sprite->imgIdle,
                        'frameRate' => 8,
                        'frameBuffer' => 200,
                    ],
                    'FallLeft' => [
                        'imageSrc' => $sprite->imgIdle,
                        'frameRate' => 8,
                        'frameBuffer' => 200,
                    ],
                    'RunLeft' => [
                        'imageSrc' => $sprite->imgIdle,
                        'frameRate' => 8,
                        'frameBuffer' => 12,
                    ],
                    'IdleLeft' => [
                        'imageSrc' => $sprite->imgIdle,
                        'frameRate' => 8,
                        'frameBuffer' => 200,
                    ],
                    'JumpLeft' => [
                        'imageSrc' => $sprite->imgIdle,
                        'frameRate' => 8,
                        'frameBuffer' => 200,
                    ],
                ],
            ];
        })->toArray();
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

