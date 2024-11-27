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
    $eventId = $request->input('eventId');

    // Fetch place and event details from the database
    $place = $placeId !== null ? DB::table('places')->where('placeNumber', $placeId)->first() : null;
    $event = $eventId !== null ? DB::table('events')->where('id', $eventId)->first() : null;

    if (!$place && !$event) {
        return redirect()->back()->with('error', 'No valid place or event found.');
    }

    // Initialize session cart
    $cart = session()->get('cart', []);

    // Add place to cart
    if ($place) {
        $placeImageUrl = $place->im1
            ? 'data:image/jpeg;base64,' . base64_encode($place->im1)
            : asset('images/default.png');

        $cart["place_$placeId"] = [
            'id' => $place->placeNumber,
            'type' => 'place', // Add type for distinction
            'name' => $place->placeName,
            'image_url' => $placeImageUrl,
            'location' => $place->location,
            'description' => $place->shortDetail,
            'details' => [
                'openingHours' => $place->openningHours,
                'website' => $place->websiteLink,
            ],
        ];
    }

    // Add event to cart
    if ($event) {
        $eventImageUrl = $event->image_url
            ? 'data:image/jpeg;base64,' . base64_encode($event->image_url)
            : asset('images/default.png');

        $cart["event_$eventId"] = [
            'id' => $event->id,
            'type' => 'event', // Add type for distinction
            'name' => $event->title, // Assuming event name is `eventName`
            'image_url' => $eventImageUrl,
            'location' => $event->location,
            'description' => $event->description,
            'details' => [
                'website' => $event->website,
                'price' => $event->price,
            ],
        ];
    }

    // Store updated cart in the session
    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Item(s) added to cart successfully!');
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
    public function removeFromCart(Request $request, $itemId)
    {
        $cart = session()->get('cart', []);

        // Check if the item exists in the cart
        if (isset($cart[$itemId])) {
            unset($cart[$itemId]); // Remove the item
            session()->put('cart', $cart); // Update the session

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
