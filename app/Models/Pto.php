<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pto extends Model
{
    protected $fillable = ['name', 'type', 'subject', 'date_start', 'date_end'];
}
