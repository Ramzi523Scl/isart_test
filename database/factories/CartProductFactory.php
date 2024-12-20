<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CartProductFactory extends Factory
{
	protected $model = CartProduct::class;

	public function definition(): array
	{
		return [
			'cart_id' => $this->faker->randomElement(Cart::all()->pluck('id')),
			'product_id' => $this->faker->randomElement(Product::all()->pluck('id')),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];
	}
}
