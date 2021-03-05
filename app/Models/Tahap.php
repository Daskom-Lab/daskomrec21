<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahap extends Model
{
    use HasFactory;
    protected $fillable = [
        'urut_tahap',
    ];
    /*public function Status(){
        return $this->hasMany(Status::class);
    }*/
}
