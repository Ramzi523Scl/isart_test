<?php

namespace App\Actions\Cart;

use App\Http\Requests\Cart\AddProductCartRequest;
use App\Models\Cart;
use App\Models\CartProduct;

class AddProductCartAction
{
	public function handle(AddProductCartRequest $request, string $uuid): void
	{

		$data = $request->validated();
		unset($data['uuid']);

		$cart     = Cart::whereUuid($uuid)->first();
		$cartItem = CartProduct::whereCartId($cart->id)->whereProductId($data['product_id'])->first();

		$cartItem->exists ? $this->updateProductInCart($cartItem, $data) : $this->addProductInCart($data);

	}

	private function addProductInCart(array $data): void
	{
		CartProduct::create($data);
	}

	private function updateProductInCart(CartProduct $cartItem, array $data): void
	{
		$quantity = $cartItem->quantity + $data['quantity'];
		$cartItem->update(['quantity' => $quantity]);
	}
}