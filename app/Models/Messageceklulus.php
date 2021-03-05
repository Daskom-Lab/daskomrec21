<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messageceklulus extends Model
{
    use HasFactory;
    protected $fillable = [
        'lolostext','notlolostext','linktext',
    ];
}
