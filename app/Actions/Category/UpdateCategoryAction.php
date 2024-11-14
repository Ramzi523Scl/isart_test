<?php

namespace App\Actions\Category;

use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;

class UpdateCategoryAction
{
	public function handle(UpdateCategoryRequest $request, Category $category): Category
	{
		$data = $request->validated();
		$category->update($data);

		return $category;
	}

}