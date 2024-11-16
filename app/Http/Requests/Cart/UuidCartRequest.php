<?php

namespace App\Http\Requests\Cart;

use App\Rules\IsCartUuidExistRule;
use Illuminate\Foundation\Http\FormRequest;

class UuidCartRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'uuid' => ['required', 'string', new IsCartUuidExistRule()],
		];
	}

	public function validationData(): array
	{
		return array_merge($this->all(), $this->route()->parameters());
	}
}
