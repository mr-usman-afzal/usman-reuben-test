<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Screen2Controller extends Controller
{
    public function index()
    {
        $api = Http::get('https://api.unsplash.com/photos/?client_id=8LRrPkARZWHL0n_pKOht9PTR_zcCW6KOlxSVTEDgKME');

        return response()->json([
            'status' => true,
            'data' => collect($api->json())->random(1)->first()
        ]);
    }
}
