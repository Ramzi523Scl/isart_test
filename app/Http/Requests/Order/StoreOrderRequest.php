<?php

namespace App\Http\Requests\Order;

use App\Rules\IsCartUuidExistRule;
use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'cart_uuid'    => ['bail', 'required', 'string', new IsCartUuidExistRule()],
		];
	}

}
