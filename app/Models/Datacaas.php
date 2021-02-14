<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datacaas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'nim' , 'email','password',
    ];
}
