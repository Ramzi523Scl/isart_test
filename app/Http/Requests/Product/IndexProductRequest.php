<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class IndexProductRequest extends FormRequest
{
	public function rules(): array
	{

		return [
			'order_by_field'     => 'nullable|string|in:id,created_at,category,price,weight,length',
			'order_by_direction' => 'nullable|string',
			'created_at_start'   => 'nullable|string|date_format:Y-m-d H:i:s',
			'created_at_end'     => 'nullable|string|date_format:Y-m-d H:i:s',
			'category_title'     => 'nullable|string',
			'categories'         => 'nullable|array',
			'categories.*'       => 'required|integer|exists:categories,id',
			'price'              => 'nullable|integer',
			'weight'             => 'nullable|integer',
			'length'             => 'nullable|integer',
			'first'              => 'nullable|int|min:10|max:100',
			'page'               => 'nullable|int',
		];
	}

}
