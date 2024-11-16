<?php

namespace App\Actions\Cart;

use App\Models\Cart;

class DeleteCartAction
{
	public function handle(string $uuid): void
	{
		$cart = Cart::whereUuid($uuid)->first();
		$cart->delete();
	}

}