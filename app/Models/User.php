<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'balance',
        'email',
        'currency',
        'uuid'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];
    public $timestamps = false;
    public static function rules($id)
    {
        return [
            'balance' => ['required', 'max:14'],
            'currency' => ['required', 'string', 'min:3'],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id, 'uuid'),

            ],
        ];
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'parent_email', 'email');
    }
}