<?php

namespace App\Actions\Client;

use App\Http\Requests\Client\RegisterClientRequest;
use App\Models\Client;

class RegisterClientAction
{
	public function handle(RegisterClientRequest $request): void
	{
		$data             = $request->validated();
		$data['password'] = \Hash::make($data['password']);

		Client::create($data);
	}

}