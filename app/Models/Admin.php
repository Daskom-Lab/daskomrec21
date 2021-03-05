<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'nama','kodas','password',
    ];
    protected $guard = 'admins';
    protected $table = 'admins';
    protected $hidden = [
     'password','remember_token',
    ];
}