<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\ModelTools;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes, HasFactory, Filterable, Sortable, ModelTools;

	protected $fillable = [
			'title',
			'description',
			'link',
			'category_id',
			'price',
			'weight',
			'length',
			'width',
		];

	protected static function boot(): void
	{
		parent::boot();
		static::creating(function ($model) {
			$model->link = self::getUniqueLink($model->title);
		});
		static::updating(function ($model) {
			$model->link = self::getUniqueLink($model->title, $model->id);
		});
	}

	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class, 'category_id');
	}
}
