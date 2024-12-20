<?php

use App\Models\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void
	{
		Schema::create('orders', function (Blueprint $table) {
			$table->id();
			$table->foreignId('cart_id');
			$table->integer('amount');
			$table->string('client_name');
			$table->string('client_email');
			$table->string('client_phone');
			$table->foreignId('client_id')->nullable()->constrained((new Client())->getTable());
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('orders');
	}
};
