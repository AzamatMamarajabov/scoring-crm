<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Superadmin', 'phone'=> '+998991112233','password'=>bcrypt('user'), 'role'=>'superadmin','store_id'=>'0', 'active'=>'1'],
            ['name' => 'Manager', 'phone'=> '+998991132233','password'=>bcrypt('user'), 'role'=>'manager','store_id'=>'0', 'active'=>'1'],
            ['name' => 'Accountant', 'phone'=> '+998991142233','password'=>bcrypt('user'), 'role'=>'accountant','store_id'=>'0', 'active'=>'1'],
            ['name' => 'Admin 2', 'phone'=> '+998990113616','password'=>bcrypt('user'), 'role'=>'admin','store_id'=>'0', 'active'=>'1'],
            ['name' => 'ahmad', 'phone'=> '+998940022222','password'=>bcrypt('user'), 'role'=>'admin','store_id'=>'0', 'active'=>'1'],
        ];
        foreach ($data as $name) {
            DB::table('users')->insert($name);
        }
    }
}
