<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartCollection;

class UserCartsController extends Controller
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

        $carts = $user
            ->carts()
            ->search($search)
            ->latest()
            ->paginate();

        return new CartCollection($carts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        // $this->authorize('create', Cart::class);

        $validated = $request->validate([
            'product_id' => ['required', 'max:255'],
            'session' => ['required', 'max:255'],
            'quantity' => ['required', 'numeric'],
            'specification' => ['required', 'max:255', 'string'],
        ]);

        $cart = $user->carts()->create($validated);

        return new CartResource($cart);
    }
}
