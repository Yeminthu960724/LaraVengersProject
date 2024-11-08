<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceController extends Controller
{
<<<<<<< HEAD
    public function index(Request $request){
        $post = DB::table('places')->paginate(12);
=======
    public function index(){
        $post = DB::table('places')->get();;
>>>>>>> 18ed83280d95448f3e20fc9c6a288d669b36e6be
        return view('place', compact('post'));
    }
}
