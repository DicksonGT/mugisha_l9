<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatusTableSeeder::class,
            AdminSeeder::class,
            DistrictsTableSeeder::class,
            RegionsTableSeeder::class,
        ]);
        
    }
}
