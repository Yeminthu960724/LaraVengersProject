<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(Request $request) {
        // 1ページあたり6件表示するようにページネーションを設定
        $places = DB::table('places')->paginate(6);

        // 画像データをbase64エンコード
        foreach ($places as $place) {
            $place->im1 = 'data:image/jpeg;base64,' . base64_encode($place->im1);
        }

        return view('place', compact('places'));
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
