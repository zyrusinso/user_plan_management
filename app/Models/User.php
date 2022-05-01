<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        // 'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function statusList(){
        return [
            'active' => 'Active',
            'inactive' => 'inActive'
        ];
    }

    public static function roleList(){
        return [
            '0' => 'User',
            '1' => 'Admin'
        ];
    }

    public static function insuranceList(){
        return [
            '5' => 'Basic Insurance Plan',
            '6' => 'Silver Insurance Plan',
        ];
    }

    public static function planList(){
        return [
            '1' => 'Plan A',
            '2' => 'Plan B',
            '3' => 'Plan C',
            '4' => 'Plan D',
        ];
    }
}
