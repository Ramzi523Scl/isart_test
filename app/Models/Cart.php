<?php

namespace App\Models;

use App\Traits\ModelTools;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
	use SoftDeletes, HasFactory, ModelTools;

	protected $fillable = [
			'uuid',
			'client_id',

		];
	protected static function boot(): void
	{
		parent::boot();

		static::creating(function ($model) {
			$model->uuid = self::getUniqueUuid();
		});

		static::deleting(function ($model) {
			CartProduct::where('cart_id', $model->id)->delete();
		});
	}

	public function client(): BelongsTo
	{
		return $this->belongsTo(Client::class, 'client_id');
	}

	public function items(): ?HasMany
	{
		return $this->hasMany(CartProduct::class, 'cart_id', 'id');
	}

	// App\Models\Cart.php
	public function products()
	{
		return $this->hasManyThrough(
			Product::class,
			CartProduct::class,
			'cart_id',    // Foreign key on CartProduct table
			'id',         // Foreign key on Product table
			'id',         // Local key on Cart table
			'product_id'  // Local key on CartProduct table
		);
	}

}
