<?php

namespace App\Sorters;

use Illuminate\Database\Eloquent\Builder;

class ProductSorter extends QuerySorter
{
	public function category($field, $direction): Builder
	{
		return $this->builder->whereHas('category', function (Builder $query) use ($field, $direction) {
			$query->orderBy($field, $direction);
		});
	}

}
