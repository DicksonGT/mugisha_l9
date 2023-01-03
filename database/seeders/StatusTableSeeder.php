<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->truncate();

        if(DB::table('statuses')->get()->count() == 0){

            //Member 100
            DB::table('statuses')->insert([
                [
                    'name' => 'Active',
                    'type' => 'member',
                    'code' => 100,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'InActive',
                    'type' => 'member',
                    'code' => 101,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'New',
                    'type' => 'member',
                    'code' => 102,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Suspended',
                    'type' => 'member',
                    'code' => 103,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);

            //Points 110
            DB::table('statuses')->insert([
                [
                    'name' => 'Normal',
                    'type' => 'points',
                    'code' => 110,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ripe',
                    'type' => 'points',
                    'code' => 111,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Redeemed',
                    'type' => 'points',
                    'code' => 112,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);

            //Location 120
            DB::table('statuses')->insert([
                [
                    'name' => 'New',
                    'type' => 'location',
                    'code' => 120,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Pending',
                    'type' => 'location',
                    'code' => 121,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Confirmed',
                    'type' => 'location',
                    'code' => 122,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);

            $this->command->info('Status table seeded');

        }else{
            $this->command->error('Statuses Table is not empty, NOT seeding');
        }
    }
}
