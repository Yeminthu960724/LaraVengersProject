<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventDetailController extends Controller
{
    public function index(){
        return view('event-detail');
    }
}
