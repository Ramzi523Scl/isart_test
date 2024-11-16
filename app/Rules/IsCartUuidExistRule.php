<?php

namespace App\Rules;

use App\Models\Cart;
use App\Models\CartProduct;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsCartUuidExistRule implements ValidationRule
{

	public function validate(string $attribute, mixed $value, Closure $fail): void
	{
		$isUuidExists = Cart::whereUuid($value)->exists();

		if (!$isUuidExists) {
			$fail('Такой корзины не существует');
		}
	}
}
