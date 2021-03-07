<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Logistik extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'nama','kodastik','password',
    ];
    protected $guard = 'logistiks';
    protected $table = 'logistiks';
    protected $hidden = [
     'password','remember_token',
    ];
}
