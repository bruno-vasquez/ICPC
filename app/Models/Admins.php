<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Admins extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'password'];
    protected $hidden = ['password'];
}
