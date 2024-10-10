<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeliToken extends Model
{
    use HasFactory;
    protected $table = 'meli_token';
    protected $fillable = [
        'meli_user_id',
        'access_token',
        'refresh_token',
        'expires_at'
    ];
}
