<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'name',
        'username',
        'email',
        'join_date',
        'last_login',
        'phone_number',
        'role_name',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /** auto generate id */
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            // Retrieve the last user record ordered by user_id
            $lastUser = self::orderBy('user_id', 'desc')->first();

            // Determine the next ID number
            $nextID = $lastUser ? intval(substr($lastUser->user_id, 3)) + 1 : 1;

            do {
                // Generate the new user_id
                $model->user_id = 'BKKBN-' . sprintf("%04s", $nextID++);
            } while (self::where('user_id', $model->user_id)->exists());
        });
    }

    public static function findByEmailOrUsername($value)
    {
        return static::where('email', $value)
                     ->orWhere('username', $value)
                     ->first();
    }
}
