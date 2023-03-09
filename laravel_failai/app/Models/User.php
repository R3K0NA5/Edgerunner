<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * Class User
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon $email_verified_at
 * @property string $password
 * @property string $role
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLE_ADMIN   = 'admin';
    public const ROLE_USER    = 'user';


    public const ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_USER,
    ];
    protected $guarded = [
        'role',
    ];
    public const ROLE_DEFAULT = self::ROLE_USER;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
    public function isAdmin():bool{
        return $this->role === self::ROLE_ADMIN;
    }
    public function isUser():bool{
        return $this->role === self::ROLE_USER;
    }
}
