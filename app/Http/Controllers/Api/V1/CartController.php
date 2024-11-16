<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Cart\AddProductCartAction;
use App\Actions\Cart\DeleteCartAction;
use App\Actions\Cart\RemoveProductCartAction;
use App\Actions\Cart\ShowCartAction;
use App\Actions\Cart\StoreCartAction;
use App\Actions\Cart\UpdateProductCartAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddProductCartRequest;
use App\Http\Requests\Cart\RemoveProductCartRequest;
use App\Http\Requests\Cart\UpdateProductCartRequest;
use App\Http\Requests\Cart\UuidCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Product;

class CartController extends Controller
{

	public function store(StoreCartAction $action)
	{
		return new CartResource($action->handle());
	}

	public function show(UuidCartRequest $request, string $uuid, ShowCartAction $action)
	{
		return new CartResource($action->handle($uuid));
	}

	public function destroy(UuidCartRequest $request, string $uuid, DeleteCartAction $action)
	{
		$action->handle($uuid);

		return response()->json();
	}

	public function addProduct(AddProductCartRequest $request, string $uuid, AddProductCartAction $action)
	{
		$action->handle($request, $uuid);

		return response()->json();
	}

	public function updateProduct(UpdateProductCartRequest $request, string $uuid, UpdateProductCartAction $action)
	{
		$action->handle($request, $uuid);

		return response()->json();
	}

	public function removeProduct(
		RemoveProductCartRequest $request,
		string                   $uuid,
		int                  $product_id,
		RemoveProductCartAction  $action
	) {
		$action->handle($uuid, $product_id);

		return response()->json();
	}

}
