<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class ResultController extends Controller
{
    public function index()
    {

        return view('result');

    }

    public function chat(Request $request)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer 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',
                'Content-Type' => 'application/json',
            ])->post('https://api.perplexity.ai/chat/completions', [
                'messages' => $request->input('messages'),
                'model' => $request->input('model'),
            ]);

            return $response->json();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
