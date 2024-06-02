<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Order;
use GuzzleHttp\Client;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        try {
            $client = new Client([
                'verify' => false,
            ]);

            $response = $client->request('POST', 'https://api.tech.redventures.com.br/orders/generate-id', [
                'headers' => [
                    'x-api-key' => 'ZtVdh8XQ2U8pWI2gmZ7f796Vh8GllXoN7mr0djNf'
                ]
            ]);
            $body = $response->getBody();
            $orderId = json_decode($body->getContents())->orderId;

            $order = Order::create([
                'orderId' => $orderId,
                'brothId' => $request->brothId,
                'proteinId' => $request->proteinId,
            ]);

            return response()->json($order, 201);
        } catch (\Throwable $th) {
            var_dump($th->getMessage());die;
            return response()->json(['error' => 'could not place order'], 500);
        }

    }
}
