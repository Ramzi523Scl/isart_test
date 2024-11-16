<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'title'       => ['required', 'string'],
			'description' => ['nullable', 'string'],
			'category_id' => ['required', 'exists:categories,id'],
			'price'       => ['required', 'integer'],
			'weight'      => ['nullable', 'integer'],
			'length'      => ['nullable', 'integer'],
			'width'       => ['nullable', 'integer'],
		];
	}
}
