<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $itemName = $this->faker->unique()->word;
        $itemComm = $this->faker->unique()->word;
        // $categoryId= Category::all()->random()->id;
        $randomCategoryId = Category::inRandomOrder()->value('id');
        $categoryName=Category::find($randomCategoryId)->name;
        return [
            'name' => $itemName,
            'commercial_name'=> $itemComm,
            'price' => $this->faker->randomFloat(2, 5, 100),
            'category_id' =>$randomCategoryId,
            'item_code'=>substr($itemName, 0, 1).substr($categoryName, 0, 1).substr($categoryName,-1).substr($itemComm, 0, 1).str_pad(strlen($itemComm),3,0,STR_PAD_LEFT)
        ];
    }
}
