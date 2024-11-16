<?php

use App\Models\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void
	{
		Schema::create('carts', function (Blueprint $table) {
			$table->id();
			$table->string('uuid')->unique();
			$table->foreignId('client_id')->nullable()->constrained((new Client())->getTable());
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('carts');
	}
};
