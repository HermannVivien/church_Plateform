<?php

namespace App\Modules\Payment\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function stats(): JsonResponse
    {
        return response()->json([
            'announcements' => 0,
            'sermons' => 0,
            'pending_mass_requests' => 0,
            'donations_total_xof' => 0,
        ]);
    }
}
