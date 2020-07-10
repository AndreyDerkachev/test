<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            ['name' => 'одежда'],
            ['name' => 'обувь'],
            ['name' => 'стиль'],
            ['name' => 'повседневное'],
            ['name' => 'черное'],
            ['name' => 'белое'],
        ]);
    }
}
