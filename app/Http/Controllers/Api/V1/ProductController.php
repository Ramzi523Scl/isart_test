<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Product\DeleteProductAction;
use App\Actions\Product\IndexProductAction;
use App\Actions\Product\ShowProductAction;
use App\Actions\Product\StoreProductAction;
use App\Actions\Product\UpdateProductAction;
use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexProductRequest;
use App\Http\Requests\Product\ShowProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Sorters\ProductSorter;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:sanctum')->except(['index', 'show']);
	}

	public function index(
		IndexProductRequest $request,
		IndexProductAction  $action,
		ProductFilter       $filter,
		ProductSorter       $sorter,
	) {
		return ProductResource::collection($action->handle($request, $filter, $sorter));
	}


	public function store(StoreProductRequest $request, StoreProductAction $action)
	{
		return new ProductResource($action->handle($request));
	}

	public function show(ShowProductRequest $request, string $link, ShowProductAction $action)
	{
		return new ProductResource($action->handle($request, $link));
	}

	public function update(UpdateProductRequest $request, Product $product, UpdateProductAction $action)
	{
		return new ProductResource($action->handle($request, $product));
	}

	public function destroy(Product $product, DeleteProductAction $action)
	{
		$action->handle($product);

		return response()->json();
	}
}
