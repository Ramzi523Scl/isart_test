<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class IndexCategoryRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'order_by_field'     => 'nullable|string|in:id,title,created_at',
			'order_by_direction' => 'nullable|string',
			'first'              => 'nullable|int|min:10|max:100',
			'page'               => 'nullable|int',
		];
	}
}
