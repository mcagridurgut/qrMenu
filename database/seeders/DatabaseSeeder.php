<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $root = \App\Models\Category::factory()->create();
        $arr = \App\Models\Category::factory(3)->create();
        foreach($arr as $item)
        {
            $item->parent_id=$root->id;
            $item->save();
        }
        $items = \App\Models\Item::factory(9)->create();
        for($i = 0; $i<9; $i++)
        {
            $items[$i]->parent_id = $arr[$i/3]->id;
            $items[$i]->save();
        }
    }
}
