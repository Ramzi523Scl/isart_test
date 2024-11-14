<?php

namespace App\Http\Requests\Client;

use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterClientRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'name'     => ['nullable'],
			'email'    => ['required', 'email', 'max:254', 'unique:clients,email'],
			'phone'    => ['required', 'string', new PhoneRule(), 'unique:clients,phone'],
			'password' => ['required', 'string', 'min:8'],
		];
	}

}
