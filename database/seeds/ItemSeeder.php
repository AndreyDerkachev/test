<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            ['name' => 'Кроссовки Nike'],
            ['name' => 'Джинсы Levis'],
            ['name' => 'Куртка NORMANN'],
            ['name' => 'Футболка Adidas'],
        ]);
    }
}
