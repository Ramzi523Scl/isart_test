<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class LoginClientRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'email'    => ['required', 'email', 'max:254', 'exists:clients,email'],
			'password' => ['required', 'string', 'min:8'],
		];
	}

}
