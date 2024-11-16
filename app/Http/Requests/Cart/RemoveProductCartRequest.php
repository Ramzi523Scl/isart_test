<?php

namespace App\Http\Requests\Cart;

use App\Rules\IsProductExistInCartRule;
use Illuminate\Foundation\Http\FormRequest;

class RemoveProductCartRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'uuid' => ['bail', 'required', 'string', 'exists:carts,uuid'],
			'product_id' => ['bail', 'required', 'integer', 'exists:products,id', new IsProductExistInCartRule($this->uuid)],
		];
	}

	public function validationData(): array
	{
		return array_merge($this->all(), $this->route()->parameters());
	}
}
