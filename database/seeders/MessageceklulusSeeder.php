<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MessageceklulusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messagecekluluses')->insert([
            'lolostext' => 'Selamat',
            'notlolostext' => 'kamu tidak lolos',
            'linktext' => 'https://daskomlab.com/',
        ]);
    }
}
