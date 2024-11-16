<?php

namespace App\Http\Requests\Cart;

use App\Rules\IsCartUuidExistRule;
use App\Rules\IsProductExistInCartRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductCartRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'uuid' => ['bail', 'required', 'string', new IsCartUuidExistRule()],
			'product' => ['bail', 'required', 'integer', 'exists:products,id', new IsProductExistInCartRule($this->uuid)],
			'quantity' => ['required', 'integer']
		];
	}

	public function validationData(): array
	{
		return array_merge($this->all(), $this->route()->parameters());
	}
}
