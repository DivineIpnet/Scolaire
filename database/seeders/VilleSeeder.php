<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VilleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('villes')->insert(
            [

            ['name' => 'Amlame',  'created_at' => new Carbon()],
            ['name' => 'Aneho',  'created_at' => new Carbon()],
            ['name' => 'Atakpame',  'created_at' => new Carbon()],
            ['name' => 'Badou',  'created_at' => new Carbon()],
            ['name' => 'Bafilo',  'created_at' => new Carbon()],
            ['name' => 'Bassar',  'created_at' => new Carbon()],
            ['name' => 'Dapaong',  'created_at' => new Carbon()],
            ['name' => 'Kandé',  'created_at' => new Carbon()],
            ['name' => 'Kante',  'created_at' => new Carbon()],
            ['name' => 'Kara',  'created_at' => new Carbon()],
            ['name' => 'Klouto',  'created_at' => new Carbon()],
            ['name' => 'Kpagouda',  'created_at' => new Carbon()],
            ['name' => 'Kpalimé',  'created_at' => new Carbon()],
            ['name' => 'Lama-Kara',  'created_at' => new Carbon()],
            ['name' => 'Lome',  'created_at' => new Carbon()],
            ['name' => 'Mango',  'created_at' => new Carbon()],
            ['name' => 'Niamtougou',  'created_at' => new Carbon()],
            ['name' => 'Notse',  'created_at' => new Carbon()],
            ['name' => 'Sansanne-Mango',  'created_at' => new Carbon()],
            ['name' => 'Sokodé',  'created_at' => new Carbon()],
            ['name' => 'Sotouboua',  'created_at' => new Carbon()],
            ['name' => 'Tabligbo',  'created_at' => new Carbon()],
            ['name' => 'Tchamba',  'created_at' => new Carbon()],
            ['name' => 'Tchaoudjo',  'created_at' => new Carbon()],
            ['name' => 'Tsevie',  'created_at' => new Carbon()],
            ['name' => 'Vogan',  'created_at' => new Carbon()],


        ]

        );
    }
}
