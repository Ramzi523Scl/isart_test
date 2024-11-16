<?php

namespace App\Actions\Order;

use App\Http\Requests\Order\StoreOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class StoreOrderAction
{
	public function handle(StoreOrderRequest $request)
	{

		$data = $request->validated();

		$cart = Cart::firstWhere('uuid', $data['cart_uuid']);
		unset($data['cart_uuid']);

		$data = $this->generateOrderData($data, $cart);

		DB::beginTransaction();
			$order = Order::create($data);
			$cart->delete();
		DB::commit();


		return $order;

	}

	private function generateOrderData($data, Cart $cart)
	{
		$data['cart_id'] = $cart->id;
		$data['amount']  = $cart->getSumProducts();

		$data['client_name']  = \Auth::user()->name;
		$data['client_email'] = \Auth::user()->email;
		$data['client_phone'] = \Auth::user()->phone;
		$data['client_id']    = \Auth::user()->id;

		return $data;

	}

}