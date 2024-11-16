<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Cart */
class CartResource extends JsonResource
{
	public function toArray(Request $request): array
	{
		return [
			'id'         => $this->id,
			'uuid'       => $this->uuid,
			'client_id'  => $this->client_id,
			'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
			'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
			'items'   => CartProductResource::collection($this->whenLoaded('items')),

		];
	}
}
