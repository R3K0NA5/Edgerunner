<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property int $user_id
 * @property int $score
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'score',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

