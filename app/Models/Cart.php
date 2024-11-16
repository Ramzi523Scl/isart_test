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

	/**
	 * Получить связку об одном товаре из корзины
	 */
	public function items(): ?HasMany
	{
		return $this->hasMany(CartProduct::class, 'cart_id', 'id');
	}

	/**
	 * Получить сумму всех товаров из корзины
	 */
	public function getSumProducts(): int
	{
		$this->load('items.product');

		return $this->items->sum(function ($item) {
			$quantity = (int)$item->quantity;
			$price    = (float)($item->product->price ?? 0);

			return $quantity * $price;
		});
	}

}
