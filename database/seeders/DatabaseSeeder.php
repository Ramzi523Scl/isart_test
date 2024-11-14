<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
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


	}
}
