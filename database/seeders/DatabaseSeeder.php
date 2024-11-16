<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		Client::factory()->create([
			'name'     => 'Тестовый клиент',
			'email'    => 'test@example.com',
			'password' => bcrypt(12345678),
		]);

		Client::factory(10)->create();
		Category::factory(7)->create();
		Product::factory(100)->create();
		Cart::factory(5)->create();
		CartProduct::factory(100)->create();


	}
}
