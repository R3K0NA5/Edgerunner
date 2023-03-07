<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Sprite
 * @package App\Models
 *
 * @property int $id
 * @property string $description
 * @property string $imgIdle
 * @property string $imgRun
 * @property string $imgJump
 * @property string $imgFall
 * @property string $imgIdleLeft
 * @property string $imgRunLeft
 * @property string $imgJumpLeft
 * @property string $imgFallLeft
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Sprite extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'imgIdle',
        'imgRun',
        'imgJump',
        'imgFall',
        'imgIdleLeft',
        'imgRunLeft',
        'imgJumpLeft',
        'imgFallLeft',
    ];
}
