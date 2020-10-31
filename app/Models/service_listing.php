<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Passport\HasApiTokens;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class service_listing extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    // protected $guard = 'users';

     protected $fillable = [
        'logo','service_name', 'category', 'description','location','phone','email', 'website'
    ];
}
