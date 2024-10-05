<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * @property int id
 * @property string name
 * @property string email
 * @property Carbon email_verified_at
 * @property string password
 * @property string remember_token
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property string verification_code
 * @property bool is_verified
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_code',
        'is_verified',
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
            'is_verified' => 'bool'
        ];
    }

    public function scopeVerified(Builder $query)
    {
        $query->where('is_verified', '>', 0);
    }
    public function scopeUnverified(Builder $query)
    {
        $query->where('is_verified', '=', 0);
    }
}
