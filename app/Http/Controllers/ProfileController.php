<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function myProfile()
    {
        return view('myprofile');
    }
}
