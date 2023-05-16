<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class StarshipController extends Controller
{
    public function index(): JsonResponse
    {
        $response = Http::swapi()->get('starships');

        return response()->json(
            $response->json(),
            $response->status()
        );
    }
}
