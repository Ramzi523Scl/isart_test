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

		$cart     = Cart::whereUuid($uuid)->first();
		$data['cart_id'] = $cart->id;
		unset($data['uuid']);


		$cartItem = CartProduct::whereCartId($cart->id)->whereProductId($data['product_id'])->first();

		is_null($cartItem) ? $this->addProductInCart($data) : $this->updateProductInCart($cartItem, $data);

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