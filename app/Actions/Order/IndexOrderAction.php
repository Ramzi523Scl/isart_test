<?php

namespace App\Actions\Order;

use App\Filters\OrderFilter;
use App\Models\Order;
use App\Sorters\OrderSorter;

class IndexOrderAction
{
	public function handle(OrderFilter $filter, OrderSorter $sorter)
	{
		$client = \Auth::user();

//		$orders = $client->orders;
//		return $orders;

		return Order::whereClientId($client->id)
			->filter($filter)
			->sorter($sorter)
			->paginate($request->first ?? 10, ['*'], 'page', $request->page ?? 1);

	}

}