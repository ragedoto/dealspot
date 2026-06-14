<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Order;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => ['required', 'exists:orders,id'],
            'message' => ['required', 'string'],
        ]);

        $order = Order::findOrFail($request->order_id);

        if (
            auth()->id() !== $order->buyer_id &&
            auth()->id() !== $order->seller_id
        ) {
            abort(403);
        }

        $receiverId = auth()->id() === $order->buyer_id
            ? $order->seller_id
            : $order->buyer_id;

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiverId,
            'message' => $request->message,
        ]);

        return redirect()->route('orders.show', $order);
    }
}