<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    // OPtion C
    public function index(Request $request, string $resource): JsonResponse
    {
        $response = Http::swapi()->get($resource, $request->only('search', 'page'));

        return response()->json(
            $response->json(),
            $response->status()
        );
    }
}
