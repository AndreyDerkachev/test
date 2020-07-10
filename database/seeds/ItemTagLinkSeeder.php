<?php

use Illuminate\Database\Seeder;

class ItemTagLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_tag_link')->insert([
            ['item_id' => '1','tag_id' => '2'],
            ['item_id' => '1','tag_id' => '3'],
            ['item_id' => '1','tag_id' => '5'],
            ['item_id' => '2','tag_id' => '1'],
            ['item_id' => '2','tag_id' => '4'],
            ['item_id' => '3','tag_id' => '1'],
            ['item_id' => '3','tag_id' => '4'],
            ['item_id' => '3','tag_id' => '6'],
            ['item_id' => '4','tag_id' => '1'],
            ['item_id' => '4','tag_id' => '6'],
        ]);
    }
}
