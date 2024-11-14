<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneRule implements ValidationRule
{
	public function validate(string $attribute, mixed $value, Closure $fail): void
	{
		$result = preg_match('/^7\d{10}$/', $value);

		if (!$result) {
			$fail('Не правильный номер');
		}
	}
}
