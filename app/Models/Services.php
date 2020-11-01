<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Passport\HasApiTokens;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Services extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guard = 'user';

    protected $fillable = [
        'service_name', 'category', 'description'
    ];

    public $timestamps = false;
}
