<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Client\LoginClientAction;
use App\Actions\Client\MeClientAction;
use App\Actions\Client\RegisterClientAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\LoginClientRequest;
use App\Http\Requests\Client\RegisterClientRequest;
use App\Http\Resources\ClientResource;

class ClientController extends Controller
{

	public function register(RegisterClientRequest $request, RegisterClientAction $action)
	{
		$action->handle($request);
		return response()->json();
	}

	public function login(LoginClientRequest $request, LoginClientAction $action)
	{
		return $action->handle($request);
	}

	public function me(MeClientAction $action)
	{
		return new ClientResource($action->handle());
	}

}
