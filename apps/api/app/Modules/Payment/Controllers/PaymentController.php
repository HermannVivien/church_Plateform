<?php

namespace App\Modules\Payment\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function initDonation(Request $request): JsonResponse
    {
        return response()->json([
            'reference' => 'TODO_GENERATE',
            'redirect_url' => null,
        ]);
    }

    public function status(string $reference): JsonResponse
    {
        return response()->json(['reference' => $reference, 'status' => 'pending']);
    }
}
