<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2,true),
            'description' => $this->faker->paragraph(),
            'price' => $this->float_rand(0,100,2)
        ];
    }

    /**
     * Generate Float Random Number
     *
     * @param float $Min Minimal value
     * @param float $Max Maximal value
     * @param int $round The optional number of decimal digits to round to. default 0 means not round
     * @return float Random float value
     */
    function float_rand($min, $max, $round=0){
        //validate input
        $randomfloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);
        if($round>0)
            $randomfloat = round($randomfloat,$round);

        return $randomfloat;
    }
}
