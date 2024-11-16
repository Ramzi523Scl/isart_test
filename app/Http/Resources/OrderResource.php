<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Order */
class OrderResource extends JsonResource
{
	public function toArray(Request $request): array
	{
		return [
			'id'           => $this->id,
			'cart_id'      => $this->cart_id,
			'amount'       => $this->amount,
			'client_name'  => $this->client_name,
			'client_email' => $this->client_email,
			'client_phone' => $this->client_phone,
			'created_at'   => $this->created_at?->format('Y-m-d H:i:s'),
			'updated_at'   => $this->updated_at?->format('Y-m-d H:i:s'),

			'cart' => new CartResource($this->whenLoaded('cart')),
		];
	}
}
