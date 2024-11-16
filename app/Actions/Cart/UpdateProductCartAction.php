<?php

namespace App\Actions\Cart;

use App\Http\Requests\Cart\UpdateProductCartRequest;
use App\Models\Cart;
use App\Models\CartProduct;

class UpdateProductCartAction
{
	public function handle(UpdateProductCartRequest $request, string $uuid): void
	{

		$data = $request->validated();

		$cart = Cart::whereUuid($uuid)->first();

		CartProduct::whereCartId($cart->id)
			->whereProductId($data['product_id'])
			->update(['quantity' => $data['quantity']]);

	}

}