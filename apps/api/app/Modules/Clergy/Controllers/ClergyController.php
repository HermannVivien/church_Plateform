<?php

namespace App\Modules\Clergy\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ClergyController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(['data' => []]);
    }
}
