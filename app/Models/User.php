<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nis',
        'password',
        'role',
        'email', // tetap boleh ada, tapi tidak digunakan untuk login
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Gunakan kolom 'nis' sebagai identifier untuk login.
     */
    public function getAuthIdentifierName()
    {
        return 'nis';
    }
}
