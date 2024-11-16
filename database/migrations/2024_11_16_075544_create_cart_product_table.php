<?php

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void
	{
		Schema::create('cart_products', function (Blueprint $table) {
			$table->id();
			$table->foreignId('cart_id')->constrained((new Cart())->getTable());
			$table->foreignId('product_id')->constrained((new Product())->getTable());
			$table->integer('quantity')->default(1);
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('cart_products');
	}
};
