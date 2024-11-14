<?php

namespace App\Actions\Client;

use App\Http\Requests\Client\RegisterClientRequest;
use App\Models\Client;
use App\Models\User;

class MeClientAction
{
	public function handle()
	{
		$client = \Auth::user();
		return $client;
	}

}