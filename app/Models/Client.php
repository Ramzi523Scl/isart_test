<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
	use HasApiTokens, HasFactory, Notifiable;


	protected $fillable = [
			'name',
			'email',
			'phone',
			'password',
		];

	protected $casts = [
			'created_at' => 'datetime:Y-m-d H:i:s',
			'updated_at' => 'datetime:Y-m-d H:i:s',
		];

	public function orders(): ?HasMany
	{
		return $this->hasMany(Order::class, 'client_id', 'id');
	}

}
