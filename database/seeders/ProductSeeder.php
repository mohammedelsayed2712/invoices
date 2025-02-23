<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name'        => 'قسم الخزنة',
                'description' => "The product's description",
                'section_id'  => 1,
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'قسم العمليات المصرفية',
                'description' => 'Description for Product 2',
                'section_id'  => 1,
                'status'      => 'inactive',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'قسم الائتمان',
                'description' => 'Description for Product 3',
                'section_id'  => 2,
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'قسم خدمة العملاء',
                'description' => 'Description for Product 3',
                'section_id'  => 2,
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'قسم الائتمان',
                'description' => 'Description for Product 3',
                'section_id'  => 3,
                'status'      => 'active',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
