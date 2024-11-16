<?php

namespace App\Actions\Product;

use App\Http\Requests\Product\ShowProductRequest;
use App\Models\Product;

class ShowProductAction
{
	public function handle(ShowProductRequest $request, string $link): Product
	{
		$product = Product::with('category')->firstWhere('link', $link);

		return $product;
	}

}