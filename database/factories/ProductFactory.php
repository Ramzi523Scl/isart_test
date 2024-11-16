<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
	protected $model = Product::class;

	public function definition(): array
	{
		return [
			'title'       => $this->faker->word(),
			'description' => $this->faker->text(),
			'link'        => $this->faker->word(),
			'price'       => $this->faker->randomNumber(),
			'weight'      => $this->faker->randomNumber(),
			'length'      => $this->faker->randomNumber(),
			'width'       => $this->faker->randomNumber(),
			'category_id' => $this->faker->randomElement(Category::all()->pluck('id')),
			'created_at'  => Carbon::now(),
			'updated_at'  => Carbon::now(),
		];
	}
}
