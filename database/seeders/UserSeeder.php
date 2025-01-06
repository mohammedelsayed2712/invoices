<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new \App\Models\User();
        $obj->name = 'admin';
        $obj->email = 'admin@gmail.com';
        $obj->password = bcrypt('123456789');
        $obj->save();
    }
}
