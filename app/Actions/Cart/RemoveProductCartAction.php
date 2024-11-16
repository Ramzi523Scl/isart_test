<?php

namespace App\Actions\Cart;

use App\Http\Requests\Cart\RemoveProductCartRequest;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;

class RemoveProductCartAction
{
	public function handle(string $uuid, int $product_id): void
	{
		$cart = Cart::firstWhere('uuid', $uuid);
		$product = Product::find($product_id);

		CartProduct::whereCartId($cart->id)->whereProductId($product->id)->delete();
	}

}