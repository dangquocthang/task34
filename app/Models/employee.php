<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\Employee\EmployeeRoles;
use App\Enums\Employee\EmployeeStatus;
use App\Observers\EmployeeObserver;
use App\Enums\Gender;

class employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected static function boot()
    {
        parent::boot();
        self::observe(EmployeeObserver::class);
    }
    protected $fillable = [
        'code',
        'slug',
        'username',
        'fullname',
        'email',
        'phone',
        'birthday',
        'gender',
        'avatar',
        'address',
        'roles',
        'token_get_password',
        'password',
        'status'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'gender' => Gender::class,
        'status' => EmployeeStatus::class,
        'roles' => EmployeeRoles::class,
        'birthday' => 'date'
    ];
}
