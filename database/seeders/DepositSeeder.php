<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['deposit_sum' => '0', 'start_sum' => '0', 'vip_sum' => '0', 'gold_sum' => '0'],
        ];
        foreach ($data as $name) {
            DB::table('deposits')->insert($name);
        }
    }
}
