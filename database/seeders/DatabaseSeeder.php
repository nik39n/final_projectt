<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(ProductTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        


    }
}