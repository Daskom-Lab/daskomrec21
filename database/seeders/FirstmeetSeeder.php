<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FirstmeetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('firstmeets')->insert([
            'isPlotFirstmeet' => 0,
            'textPlot' => 'choose your schedule.',
            'afterChoosePlot' => 'Text After Choose Step 1.',
        ]);
    }
}
