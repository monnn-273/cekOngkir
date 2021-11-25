<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Courier;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => 'jne', 'expedition_name'=>'JNE'],
            ['code' => 'pos', 'expedition_name'=>'POS'],
            ['code' => 'tiki', 'expedition_name'=>'TIKI'],
        ];
        Courier::insert($data);
    }
}
