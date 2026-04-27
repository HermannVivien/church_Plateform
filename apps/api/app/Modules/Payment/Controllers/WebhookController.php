<?php

namespace App\Modules\Payment\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function orangeMoney(Request $request): JsonResponse
    {
        return response()->json(['received' => true]);
    }

    public function mtnMomo(Request $request): JsonResponse
    {
        return response()->json(['received' => true]);
    }

    public function wave(Request $request): JsonResponse
    {
        return response()->json(['received' => true]);
    }
}
