<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanDetailController extends Controller
{
    public function index($id)
    {
        $planId = $id ?? 'osaka'; // デフォルトは大阪プラン
        return view('planDetail', ['planId' => $planId]);
    }
}
