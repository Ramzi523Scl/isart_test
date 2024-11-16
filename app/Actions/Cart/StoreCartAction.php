<?php

namespace App\Actions\Cart;

use App\Models\Cart;

class StoreCartAction
{
	public function handle()
	{
		$client_id = \Auth::id() ?? null;
		$cart = Cart::create(['client_id' => $client_id]);

		return $cart;
	}

}