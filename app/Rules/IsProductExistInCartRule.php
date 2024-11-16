<?php

namespace App\Rules;

use App\Models\Cart;
use App\Models\CartProduct;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsProductExistInCartRule implements ValidationRule
{
	private string $uuid;
	public function __construct(string $uuid)
	{
		$this->uuid = $uuid;
	}

	public function validate(string $attribute, mixed $value, Closure $fail): void
	{
		$cart = Cart::firstWhere('uuid', $this->uuid);

		$isProductExistInCart = CartProduct::whereCartId($cart?->id)->whereProductId($value)->exists();

		if (!$isProductExistInCart) {
			$fail('Этого продукта нет в корзине');
		}
	}
}
