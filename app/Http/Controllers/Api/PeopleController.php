<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class PeopleController extends Controller
{
    // Option B
    public function index(Request $request): JsonResponse 
    {
        $response = Http::swapi()->get('people', $request->only('search', 'page'));

        return response()->json(
            $response->json(),
            $response->status()
        );
    }

    // Option A
    public function search(Request $request): JsonResponse 
    {
        $response = Http::swapi()->get('people', $request->only('search', 'page'));
    
        return response()->json(
            $response->json(),
            $response->status()
        );
    }
}
