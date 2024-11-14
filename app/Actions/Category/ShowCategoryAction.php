<?php

namespace App\Actions\Category;

use App\Http\Requests\Client\RegisterClientRequest;
use App\Models\Category;
use App\Models\Client;
use App\Sorters\CategorySorter;

class ShowCategoryAction
{
	public function handle(Category $category): Category
	{
		return $category;
	}

}