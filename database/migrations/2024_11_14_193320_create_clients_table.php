<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void
	{
		Schema::create('clients', function (Blueprint $table) {
			$table->id();
			$table->string('name')->nullable();
			$table->string('email')->unique();
			$table->string('phone')->unique();
			$table->string('password');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('clients');
	}
};
