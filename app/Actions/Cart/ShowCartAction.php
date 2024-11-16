<?php

namespace App\Actions\Cart;

use App\Models\Cart;

class ShowCartAction
{
	public function handle(string $uuid)
	{
		$cart = Cart::whereUuid($uuid)->with('items.product')->first();

		return $cart;
	}

}