<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ClientFactory extends Factory
{
	protected $model = Client::class;

	public function definition(): array
	{
		return [
			'name'       => $this->faker->name(),
			'email'      => $this->faker->unique()->safeEmail(),
			'phone'      => $this->faker->phoneNumber(),
			'password'   => bcrypt($this->faker->password()),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];
	}
}
