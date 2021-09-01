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
        // public function isPower($x, $y)
        // {
        //     if ($x == 1)
        //         return ($y == 1 ? 1 : 0);

        //     $pow = 1;
        //     while ($pow < $y)
        //         $pow *= $x;

        //     return ($pow == $y ? 1 : 0);
        // }
        //     $var = 4;
        // $depth = 3;
        // $arrSize = (pow($var,$depth+1)-1)/($var-1)-1;
        // $arr = \App\Models\Category::factory($arrSize)->create();
        // for($i = 0, $j = 1; $i<$arrSize;$i++){
        //     if(isPower($var,$i))
        // }
        $var = 5;
        $itemVar = 3;
        $arr = \App\Models\Category::factory($var)->create();
        $categories = \App\Models\Category::factory($var*$var)->create();
        for($i = 0; $i<$var*$var; $i++)
        {
            $categories[$i]->parent_id = $arr[$i/$var]->id;
            $categories[$i]->save();
        }
        $categories2 = \App\Models\Category::factory($var*$var*$var)->create();
        for($i = 0; $i<$var*$var*$var; $i++)
        {
            $categories2[$i]->parent_id = $categories[$i/$var]->id;
            $categories2[$i]->save();
        }
        $items = \App\Models\Item::factory($var*$var*$var*$itemVar)->create();
        for($i = 0; $i<$var*$var*$var*$itemVar; $i++)
        {
            $items[$i]->parent_id = $categories2[$i/$itemVar]->id;
            $categories2[$i/$itemVar]->has_item = 1;
            $items[$i]->save();
            $categories2[$i/$itemVar]->save();
        }
    }

}

