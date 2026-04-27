<?php

namespace App\Modules\Clergy\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClergyController extends Controller
{
    public function index(): JsonResponse { return response()->json(['data' => []]); }
    public function store(Request $request): JsonResponse { return response()->json([], 201); }
    public function show(int $id): JsonResponse { return response()->json([]); }
    public function update(Request $request, int $id): JsonResponse { return response()->json([]); }
    public function destroy(int $id): JsonResponse { return response()->json([], 204); }
}
