<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderCollection;

class UserOrdersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        // $this->authorize('view', $user);

        $search = $request->get('search', '');

        $orders = $user
            ->orders()
            ->search($search)
            ->latest()
            ->paginate();

        return new OrderCollection($orders);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        // $this->authorize('create', Order::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'payment_ref' => ['required', 'max:255', 'string'],
            'transacton_id' => ['required', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'country' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'discount' => ['required', 'numeric'],
            'payment_status' => ['required', 'max:255'],
            'payment_response' => ['required', 'max:255', 'string'],
            'order_status' => ['required', 'max:255'],
            'shipping_total' => ['required', 'numeric'],
        ]);

        $order = $user->orders()->create($validated);

        return new OrderResource($order);
    }
}
