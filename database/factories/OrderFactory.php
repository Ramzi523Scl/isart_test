<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderFactory extends Factory
{
	protected $model = Order::class;

	public function definition(): array
	{
		$cart      = Cart::all()->random();
		$amount    = $cart->getSumProducts();
		$client_id = $cart->client_id;

		return [
			'cart_id'      => $cart->id,
			'amount'       => $amount,
			'client_name'  => $this->faker->name(),
			'client_email' => $this->faker->unique()->safeEmail(),
			'client_phone' => $this->faker->unique()->phoneNumber(),
			'client_id'    => $client_id,
			'created_at'   => Carbon::now(),
			'updated_at'   => Carbon::now(),
		];
	}
}
