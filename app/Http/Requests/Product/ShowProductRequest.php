<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ShowProductRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'link' => ['required', 'string', 'exists:products,link'],
		];
	}

	public function validationData(): array
	{
		return array_merge($this->all(), $this->route()->parameters());
	}
}
