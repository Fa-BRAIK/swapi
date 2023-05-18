<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    public function index(Request $request): JsonResponse 
    {
        $response = Http::swapi()->get('planets', $request->only('page'));

        return response()->json(
            $response->json(), 
            $response->status()
        );
    }
}
