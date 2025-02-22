<?php

namespace App\Observers;

use App\Models\Cart;

class CartObserver
{
    public function updated(Cart $cart)
    {
        if ($cart->updated_at->diffInHours(now()) >= 24) {
            event(new CartAbandoned($cart));
        }
    }
}
