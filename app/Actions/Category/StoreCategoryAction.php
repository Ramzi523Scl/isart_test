<?php

namespace App\Actions\Category;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Category;

class StoreCategoryAction
{
	public function handle(StoreCategoryRequest $request)
	{
		$data     = $request->validated();
		$category = Category::create($data);

		return $category;
	}

}