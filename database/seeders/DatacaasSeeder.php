<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatacaasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datacaas')->insert([
            'nama' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'nim' => '1',
            'password' => bcrypt('123'),
        ]);
    }
}
