<?php

namespace App\Http\Requests\Cart;

use App\Rules\IsCartUuidExistRule;
use Illuminate\Foundation\Http\FormRequest;

class AddProductCartRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'uuid' => ['required', 'string', new IsCartUuidExistRule()],
			'product_id' => ['required', 'integer', 'exists:products,id'],
			'quantity' => ['required', 'integer']
		];
	}

	public function validationData(): array
	{
		return array_merge($this->all(), $this->route()->parameters());
	}
}
