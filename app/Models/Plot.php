<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;
    protected $fillable = [
        'datacaas_id', 'shifts_id' ,
    ];
    
    /*public function Datacaas(){
        return $this->belongsTo(Datacaas::class);
    }*/
}
