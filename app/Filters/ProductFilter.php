<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{

	public function created_at_start($value): Builder
	{
		return $this->builder->where('created_at', '>=', $value);
	}

	public function created_at_end($value): Builder
	{
		return $this->builder->where('created_at', '<=', $value);
	}

	public function category_title($value): Builder
	{
		return $this->builder->whereRelation('category', 'title', $value);
	}

	public function categories($value): Builder
	{
		return $this->builder->whereHas('category', function (Builder $query) use ($value) {
			$query->whereIn('id', $value);
		});
	}

	public function price_min($value): Builder
	{
		return $this->builder->where('price', '>=', $value);
	}

	public function price_max($value): Builder
	{
		return $this->builder->where('price', '<=', $value);
	}

	public function weight($value): Builder
	{
		return $this->builder->where('weight', $value);
	}

	public function length($value): Builder
	{
		return $this->builder->where('length', $value);
	}

}
