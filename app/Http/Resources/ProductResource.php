<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Product */
class ProductResource extends JsonResource
{
	public function toArray(Request $request): array
	{
		return [
			'id'          => $this->id,
			'title'       => $this->title,
			'description' => $this->description,
			'link'        => $this->link,
			'price'       => $this->price,
			'weight'      => $this->weight,
			'length'      => $this->length,
			'width'       => $this->width,
			'category_id' => $this->category_id,
			'category' => new CategoryResource($this->whenLoaded('category')),

			'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
			'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
		];
	}
}
