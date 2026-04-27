<?php

namespace App\Modules\MassRequest\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MassRequestController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        return response()->json(['message' => 'Demande de messe enregistrée'], 201);
    }
}
