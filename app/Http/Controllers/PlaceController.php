<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('places');

        // Apply filters if present
        if ($request->has('location')) {
            $query->whereIn('location', $request->location);
        }

        if ($request->has('characteristics')) {
            $query->where(function ($q) use ($request) {
                foreach ($request->characteristics as $characteristic) {
                    $q->orWhere('characteristics', 'like', "%{$characteristic}%");
                }
            });
        }

        // Paginate the filtered results (6 per page)
        $places = $query->paginate(6);

        // Encode images in base64 format
        foreach ($places as $place) {
            $place->im1 = 'data:image/jpeg;base64,' . base64_encode($place->im1);
        }

        // Return the view with filters and paginated places
        return view('place', compact('places'))
            ->with('filters', $request->only(['location', 'characteristics']));
    }


    public function show(string $placeNumber)
    {
        $place_detail = DB::table('places')->where('placeNumber', $placeNumber)->first();

        if ($place_detail) {
            $place_detail->im1 = 'data:image/jpeg;base64,' .base64_encode( $place_detail->im1);
            $place_detail->im2 = 'data:image/jpeg;base64,' . base64_encode( $place_detail->im2);
            $place_detail->im3 = 'data:image/jpeg;base64,' . base64_encode( $place_detail->im3);
            $place_detail->im4 = 'data:image/jpeg;base64,' . base64_encode( $place_detail->im4);
        } else {
            // Handle the case where no record is found
            return redirect()->back()->with('error', '場所が見つかりません。');
        }

         // Pass data to the view

        return view("placeDetail", compact('place_detail'));
    }


}
