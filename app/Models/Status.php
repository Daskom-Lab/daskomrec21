<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'datacaas_id', 'isLolos' , 'tahaps_id',
    ];

    /*public function Datacaas(){
        return $this->belongsTo(Datacaas::class);
    }
    public function Tahap(){
        return $this->belongsTo(Tahap::class);
    }*/
}
