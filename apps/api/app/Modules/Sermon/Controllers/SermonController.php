<?php

namespace App\Modules\Sermon\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SermonController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(['data' => [], 'meta' => []]);
    }
}
