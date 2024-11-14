<?php

namespace App\Actions\Category;

use App\Filters\CategoryFilter;
use App\Http\Requests\Category\IndexCategoryRequest;
use App\Models\Category;
use App\Sorters\CategorySorter;

class IndexCategoryAction
{
	public function handle(IndexCategoryRequest $request, CategoryFilter $filter, CategorySorter $sorter)
	{
		return Category::filter($filter)->sorter($sorter)
			->paginate($request->first ?? 10, ['*'], 'page', $request->page ?? 1);
	}

}