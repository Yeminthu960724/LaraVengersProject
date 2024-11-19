<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Add an item to the cart.
     */
    public function addToCart(Request $request)
{
    $placeId = $request->input('placeId');
    $place = DB::table('places')->where('placeNumber', $placeId)->first();

    if (!$place) {
        return redirect()->back()->with('error', 'Place not found.');
    }

    $imageUrl = $place->im1
        ? 'data:image/jpeg;base64,' . base64_encode($place->im1)
        : asset('images/default.png');

    $cart = session()->get('cart', []);
    $cart[$placeId] = [
        'id' => $place->placeNumber,
        'name' => $place->placeName,
        'image_url' => $imageUrl,
        'location' => $place->location,
        'description' => $place->shortDetail,
        'details' => [
            'openingHours' => $place->openningHours,
            'website' => $place->websiteLink,
        ],
    ];
    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Item added to cart successfully!');
}


    /**
     * Display the cart items.
     */
    public function viewCart()
    {
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }

    /**
     * Remove an item from the cart.
     */
    public function removeFromCart(Request $request, $placeId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$placeId])) {
            unset($cart[$placeId]);
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Item removed from cart.');
        }

        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    /**
     * Clear the entire cart.
     */
    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }
}
