<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->truncate();
    	
        if(DB::table('locations')->get()->count() == 0){
            
            DB::table('locations')->insert([

                [
                    'name' => 'Kilima Hewa',
                    'street' => 'Kilima Hewa',
                    'ward' => 'Kinondoni',
                    'district' => 'Kinondoni',
                    'status_code' => 262,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kijitonyama',
                    'street' => 'Kapungu',
                    'ward' => 'Kijitonyama',
                    'district' => 'Kinondoni',
                    'status_code' => 262,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);
           $this->command->info('Locations table seeded');

        }else{
            $this->command->error('Locations Table is not empty, NOT seeding');
        }
    }
}
