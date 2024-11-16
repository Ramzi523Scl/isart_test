<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes, HasFactory, Filterable, Sortable;

	protected $fillable
		= [
			'cart_id',
			'amount',
			'client_name',
			'client_email',
			'client_phone',
			'client_id',
		];

	public function cart(): BelongsTo
	{
		return $this->belongsTo(Cart::class);
	}
}
