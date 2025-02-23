<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('sections')->insert([
            [
                'name'        => 'البنك الأهلي',
                'description' => 'وصف البنك الأهلي',
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'البنك العربي',
                'description' => 'وصف البنك العربي.',
                'status'      => 'inactive',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'البنك الأفريقي',
                'description' => 'وصف البنك الأفريقي',
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
