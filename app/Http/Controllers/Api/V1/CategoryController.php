<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Category\DeleteCategoryAction;
use App\Actions\Category\IndexCategoryAction;
use App\Actions\Category\ShowCategoryAction;
use App\Actions\Category\StoreCategoryAction;
use App\Actions\Category\UpdateCategoryAction;
use App\Filters\CategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\IndexCategoryRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Sorters\CategorySorter;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:sanctum')->except(['index', 'show']);
	}

	public function index(
		IndexCategoryRequest $request,
		IndexCategoryAction  $action,
		CategoryFilter       $filter,
		CategorySorter       $sorter
	) {
		return CategoryResource::collection($action->handle($request, $filter, $sorter));
	}

	public function store(StoreCategoryRequest $request, StoreCategoryAction $action)
	{
		return new CategoryResource($action->handle($request));
	}

	public function show(Category $category, ShowCategoryAction $action,)
	{
		return new CategoryResource($action->handle($category));
	}

	public function update(UpdateCategoryRequest $request, Category $category, UpdateCategoryAction $action)
	{
		return new CategoryResource($action->handle($request, $category));
	}

	public function destroy(Category $category, DeleteCategoryAction $action)
	{
		$action->handle($category);

		return response()->json();
	}
}
