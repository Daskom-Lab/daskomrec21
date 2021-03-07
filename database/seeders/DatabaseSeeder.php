<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cekluluses')->insert([
            [
                'id'=>1,
                'isActiveCek'=>0,
                'isPlotRun'=>0,
            ],
        ]);
        DB::table('messagecekluluses')->insert([
            'lolostext' => 'Selamat',
            'notlolostext' => 'kamu tidak lolos',
            'linktext' => 'https://daskomlab.com/',
        ]);
        DB::table('statustahaps')->insert([
            'id' => 1,
            'current_tahap' => 1,
        ]);
    }
}
