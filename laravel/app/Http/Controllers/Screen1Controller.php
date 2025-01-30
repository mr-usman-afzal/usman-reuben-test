<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Screen1Model;
use Illuminate\Http\Request;

class Screen1Controller extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $query = Screen1Model::query();

        if ($search) {
            $query->where('title', 'LIKE', "%{$search}%")->orWhere('status', 'LIKE', "%{$search}%")->orWhere('notes', 'LIKE', "%{$search}%");
        }

        return response()->json([
            'status' => true,
            'data' => $query->get()
        ]);
    }
}
