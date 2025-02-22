<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return Cart::latest()->get();
    }

    public function show($id)
    {
        return Cart::findOrFail($id);
    }

    public function store(CartRequest $request)
    {
        $cart = Cart::create($request->validated());
        return response()->json($cart, 201);
    }

    public function update(CartRequest $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->validated());
        return response()->json($cart, 200);
    }

    public function destroy($id)
    {
        Cart::destroy($id);
        return response()->json(null, 204);
    }
}
