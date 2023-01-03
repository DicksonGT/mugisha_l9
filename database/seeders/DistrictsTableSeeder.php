<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->truncate();
        
        if(DB::table('districts')->get()->count() == 0){
            
            DB::table('districts')->insert([

                /*Dar Es Salaam*/

                [
                    'name' => 'Ilala ',
                    'code' => '100',
                    'region_id' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kigamboni',
                    'code' => '101',
                    'region_id' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kinondoni',
                    'code' => '102',
                    'region_id' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Temeke',
                    'code' => '103',
                    'region_id' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ubungo',
                    'code' => '104',
                    'region_id' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Nothern*/
                /* Arusha Province */
                ,
                [
                    'name' => 'Arusha City',
                    'code' => '201',
                    'region_id' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Arusha Rural',
                    'code' => '202',
                    'region_id' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Karatu',
                    'code' => '203',
                    'region_id' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Longido',
                    'code' => '204',
                    'region_id' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Meru',
                    'code' => '205',
                    'region_id' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Monduli',
                    'code' => '206',
                    'region_id' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ngorongoro',
                    'code' => '207',
                    'region_id' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Kilimanjaro*/
                ,
                [
                    'name' => 'Moshi',
                    'code' => '208',
                    'region_id' => 3,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Moshi Municipal',
                    'code' => '209',
                    'region_id' => 3,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Hai',
                    'code' => '210',
                    'region_id' => 3,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Siha',
                    'code' => '211',
                    'region_id' => 3,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Rombo',
                    'code' => '212',
                    'region_id' => 3,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mwanga',
                    'code' => '213',
                    'region_id' => 3,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Same',
                    'code' => '214',
                    'region_id' => 3,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Manyara*/

                ,
                [
                    'name' => 'Babati',
                    'code' => '215',
                    'region_id' => 4,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Babati Town',
                    'code' => '216',
                    'region_id' => 4,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Hanang',
                    'code' => '217',
                    'region_id' => 4,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kiteto',
                    'code' => '218',
                    'region_id' => 4,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mbulu',
                    'code' => '219',
                    'region_id' => 4,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Simanjiro',
                    'code' => '220',
                    'region_id' => 4,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
                

                /*Tanga*/

                ,
                [
                    'name' => 'Handeni',
                    'code' => '221',
                    'region_id' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Handeni Town',
                    'code' => '222',
                    'region_id' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kilindi',
                    'code' => '223',
                    'region_id' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Korogwe',
                    'code' => '224',
                    'region_id' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Korogwe Town',
                    'code' => '225',
                    'region_id' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Lushoto',
                    'code' => '226',
                    'region_id' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Muheza',
                    'code' => '227',
                    'region_id' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mkinga',
                    'code' => '228',
                    'region_id' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Pangani',
                    'code' => '229',
                    'region_id' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Tanga',
                    'code' => '230',
                    'region_id' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Bumbuli',
                    'code' => '231',
                    'region_id' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]


                /*Southern Highlands*/

                /*Iringa*/

                ,
                [
                    'name' => 'Iringa',
                    'code' => '300',
                    'region_id' => 6,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kilolo',
                    'code' => '301',
                    'region_id' => 6,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mufindi',
                    'code' => '302',
                    'region_id' => 6,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mafinga',
                    'code' => '303',
                    'region_id' => 6,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]


                /*Mbeya*/
                ,
                [
                    'name' => 'Mbeya City',
                    'code' => '304',
                    'region_id' => 7,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mbeya District',
                    'code' => '305',
                    'region_id' => 7,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Busokole',
                    'code' => '306',
                    'region_id' => 7,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Chunya',
                    'code' => '307',
                    'region_id' => 7,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kyela',
                    'code' => '308',
                    'region_id' => 7,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mbarali',
                    'code' => '309',
                    'region_id' => 7,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Rungwe',
                    'code' => '310',
                    'region_id' => 7,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Njombe*/

                ,
                [
                    'name' => 'Ludewa',
                    'code' => '311',
                    'region_id' => 8,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Makambako',
                    'code' => '312',
                    'region_id' => 8,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Makete',
                    'code' => '313',
                    'region_id' => 8,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Njombe District',
                    'code' => '314',
                    'region_id' => 8,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Njombe Town',
                    'code' => '315',
                    'region_id' => 8,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Wangingombe',
                    'code' => '316',
                    'region_id' => 8,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Rukwa*/

                ,
                [
                    'name' => 'Kalambo',
                    'code' => '317',
                    'region_id' => 9,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Lyamba Iya Mfipa',
                    'code' => '318',
                    'region_id' => 9,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Nkasi',
                    'code' => '319',
                    'region_id' => 9,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Sumbawanga',
                    'code' => '320',
                    'region_id' => 9,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]


                /*Ruvuma*/

                ,
                [
                    'name' => 'Mbinga',
                    'code' => '321',
                    'region_id' => 10,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Namtumbo',
                    'code' => '322',
                    'region_id' => 10,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Nyasa',
                    'code' => '323',
                    'region_id' => 10,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Songea',
                    'code' => '324',
                    'region_id' => 10,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Songea Municipal',
                    'code' => '325',
                    'region_id' => 10,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Tunduru',
                    'code' => '326',
                    'region_id' => 10,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Songwe*/

                ,
                [
                    'name' => 'Ileje',
                    'code' => '327',
                    'region_id' => 11,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mbozi',
                    'code' => '328',
                    'region_id' => 11,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Momba',
                    'code' => '329',
                    'region_id' => 11,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Songwe',
                    'code' => '330',
                    'region_id' => 11,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Western Zone*/
                /*Katavi*/

                ,
                [
                    'name' => 'Nsimbo',
                    'code' => '400',
                    'region_id' => 12,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mpanda',
                    'code' => '401',
                    'region_id' => 12,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mlele',
                    'code' => '402',
                    'region_id' => 12,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Tanganyika',
                    'code' => '403',
                    'region_id' => 12,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]


                /*Kigoma*/

                ,
                [
                    'name' => 'Buhigwe',
                    'code' => '404',
                    'region_id' => 13,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kakonko',
                    'code' => '405',
                    'region_id' => 13,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kasulu Urban',
                    'code' => '406',
                    'region_id' => 13,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kasulu Rural',
                    'code' => '407',
                    'region_id' => 13,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kibondo',
                    'code' => '408',
                    'region_id' => 13,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kigoma',
                    'code' => '409',
                    'region_id' => 13,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kigoma Ujiji',
                    'code' => '411',
                    'region_id' => 13,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Uvinza',
                    'code' => '412',
                    'region_id' => 13,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]


                /*Central Zone*/

                /*Dodoma*/

                ,
                [
                    'name' => 'Dodoma',
                    'code' => '500',
                    'region_id' => 14,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Bahi',
                    'code' => '501',
                    'region_id' => 14,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Chamwino',
                    'code' => '502',
                    'region_id' => 14,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Chemba',
                    'code' => '503',
                    'region_id' => 14,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kondoa',
                    'code' => '504',
                    'region_id' => 14,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kongwa',
                    'code' => '505',
                    'region_id' => 14,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mpwapwa',
                    'code' => '506',
                    'region_id' => 14,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]


                /*Singida*/

                ,
                [
                    'name' => 'Iramba',
                    'code' => '507',
                    'region_id' => 15,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ikungi',
                    'code' => '508',
                    'region_id' => 15,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Manyoni',
                    'code' => '509',
                    'region_id' => 15,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mkalama',
                    'code' => '510',
                    'region_id' => 15,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Singida',
                    'code' => '511',
                    'region_id' => 15,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Singida Municipal',
                    'code' => '512',
                    'region_id' => 15,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Itigi',
                    'code' => '513',
                    'region_id' => 15,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Tabora*/

                ,
                [
                    'name' => 'Igunga',
                    'code' => '514',
                    'region_id' => 16,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kaliua',
                    'code' => '515',
                    'region_id' => 16,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Nzega',
                    'code' => '516',
                    'region_id' => 16,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Sikonge',
                    'code' => '517',
                    'region_id' => 16,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Tabora Municipal',
                    'code' => '518',
                    'region_id' => 16,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Urambo',
                    'code' => '519',
                    'region_id' => 16,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Uyui',
                    'code' => '520',
                    'region_id' => 16,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Coastal Zone*/
                /*Lindi*/
                ,
                [
                    'name' => 'Kilwa',
                    'code' => '600',
                    'region_id' => 17,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Lindi',
                    'code' => '601',
                    'region_id' => 17,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Liwale',
                    'code' => '602',
                    'region_id' => 17,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Nachingwea',
                    'code' => '603',
                    'region_id' => 17,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ruangwa',
                    'code' => '604',
                    'region_id' => 17,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Lindi Municipal',
                    'code' => '605',
                    'region_id' => 17,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Morogoro*/

                ,
                [
                    'name' => 'Gairo',
                    'code' => '606',
                    'region_id' => 18,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ifakara',
                    'code' => '607',
                    'region_id' => 18,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kilombelo',
                    'code' => '608',
                    'region_id' => 18,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kilosa',
                    'code' => '609',
                    'region_id' => 18,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Malinyi',
                    'code' => '610',
                    'region_id' => 18,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Morogoro',
                    'code' => '611',
                    'region_id' => 18,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Morogoro Municipal',
                    'code' => '612',
                    'region_id' => 18,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mvomero',
                    'code' => '613',
                    'region_id' => 18,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ulanga',
                    'code' => '614',
                    'region_id' => 18,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Mtwara*/

                ,
                [
                    'name' => 'Masasi',
                    'code' => '615',
                    'region_id' => 19,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Masasi Town C',
                    'code' => '615',
                    'region_id' => 19,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mtwara',
                    'code' => '616',
                    'region_id' => 19,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mtwara Mikindani',
                    'code' => '617',
                    'region_id' => 19,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Nanyumbu',
                    'code' => '618',
                    'region_id' => 19,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Newala',
                    'code' => '619',
                    'region_id' => 19,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Tandahimba',
                    'code' => '620',
                    'region_id' => 19,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Pwani*/

                ,
                [
                    'name' => 'Bagamoyo',
                    'code' => '621',
                    'region_id' => 20,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kibaha',
                    'code' => '622',
                    'region_id' => 20,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kibaha Urban',
                    'code' => '623',
                    'region_id' => 20,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kisarawe',
                    'code' => '624',
                    'region_id' => 20,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mafia',
                    'code' => '625',
                    'region_id' => 20,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mkuranga',
                    'code' => '626',
                    'region_id' => 20,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Rufiji',
                    'code' => '627',
                    'region_id' => 20,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Lake Zone*/

                /*Geita*/

                ,
                [
                    'name' => 'Bukombe',
                    'code' => '700',
                    'region_id' => 21,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Chato',
                    'code' => '701',
                    'region_id' => 21,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Geita',
                    'code' => '702',
                    'region_id' => 21,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Geita Town',
                    'code' => '703',
                    'region_id' => 21,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mbogwe',
                    'code' => '704',
                    'region_id' => 21,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Nyanghwale',
                    'code' => '705',
                    'region_id' => 21,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Kagera*/

                ,
                [
                    'name' => 'Biharamulo',
                    'code' => '706',
                    'region_id' => 22,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Bukoba',
                    'code' => '707',
                    'region_id' => 22,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Karagwe',
                    'code' => '708',
                    'region_id' => 22,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kyerwa',
                    'code' => '709',
                    'region_id' => 22,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Missenyi',
                    'code' => '710',
                    'region_id' => 22,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Muleba',
                    'code' => '711',
                    'region_id' => 22,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ngara',
                    'code' => '712',
                    'region_id' => 22,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Mara*/

                ,
                [
                    'name' => 'Bunda',
                    'code' => '713',
                    'region_id' => 23,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Butiama',
                    'code' => '714',
                    'region_id' => 23,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Musoma',
                    'code' => '715',
                    'region_id' => 23,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Musoma Municipal',
                    'code' => '716',
                    'region_id' => 23,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Rorya',
                    'code' => '717',
                    'region_id' => 23,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Serengeti',
                    'code' => '718',
                    'region_id' => 23,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Tarime',
                    'code' => '719',
                    'region_id' => 23,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Mwanza*/

                ,
                [
                    'name' => 'Ilemela',
                    'code' => '720',
                    'region_id' => 24,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kwimba',
                    'code' => '721',
                    'region_id' => 24,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Magu',
                    'code' => '722',
                    'region_id' => 24,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Misungwi',
                    'code' => '723',
                    'region_id' => 24,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Nyamagana',
                    'code' => '724',
                    'region_id' => 24,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Sengerema',
                    'code' => '725',
                    'region_id' => 24,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ukerewe',
                    'code' => '726',
                    'region_id' => 24,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]


                /*Shinyanga*/

                ,
                [
                    'name' => 'Kahama',
                    'code' => '727',
                    'region_id' => 25,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Kishapu',
                    'code' => '728',
                    'region_id' => 25,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Msalala',
                    'code' => '729',
                    'region_id' => 25,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Shinyanga',
                    'code' => '730',
                    'region_id' => 25,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Shinyanga Municipal',
                    'code' => '731',
                    'region_id' => 25,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ushetu',
                    'code' => '732',
                    'region_id' => 25,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

                /*Simiyu*/

                ,
                [
                    'name' => 'Bariadi',
                    'code' => '728',
                    'region_id' => 26,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Busega',
                    'code' => '729',
                    'region_id' => 26,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Itilima',
                    'code' => '730',
                    'region_id' => 26,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Maswa',
                    'code' => '731',
                    'region_id' => 26,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Meatu',
                    'code' => '732',
                    'region_id' => 26,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]


            ]);
           $this->command->info('Districts table seeded');

        }else{
            $this->command->error('Districts Table is not empty, NOT seeding');
        }
    }
}
