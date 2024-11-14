<?php

namespace App\Actions\Client;

use App\Http\Requests\Client\LoginClientRequest;
use App\Models\Client;

class LoginClientAction
{
	public function handle(LoginClientRequest $request): array
	{
		$data = $request->validated();

		$client = Client::firstWhere('email', $data['email']);

		$token = $client->createToken(config('app.name'))->plainTextToken;

		return [
			'token'  => $token,
			'client' => $client
		];
	}

}