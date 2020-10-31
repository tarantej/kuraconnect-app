<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class emergency_request extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    // protected $guard = 'user';

    protected $fillable = [
        'service_requested_by','phone','additional_comments','location'
    ];
}
