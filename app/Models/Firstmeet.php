<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firstmeet extends Model
{
    use HasFactory;
    protected $fillable = [
        'isPlotFirstmeet' ,'textPlot','afterChoosePlot',
    ];
}
