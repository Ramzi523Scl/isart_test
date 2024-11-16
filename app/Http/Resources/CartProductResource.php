<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\CartProduct */
class CartProductResource extends JsonResource
{
	public function toArray(Request $request): array
	{
		return [
			'id'         => $this->id,
			'cart_id'    => $this->cart_id,
			'product_id' => $this->product_id,
			'quantity'   => $this->quantity,
			'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
			'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),

			'cart'    => new CartResource($this->whenLoaded('cart')),
			'product' => new ProductResource($this->whenLoaded('product')),
		];
	}
}
