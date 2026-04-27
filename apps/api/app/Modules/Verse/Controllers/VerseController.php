<?php

namespace App\Modules\Verse\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class VerseController extends Controller
{
    public function today(): JsonResponse
    {
        $verse = DB::table('verses')
            ->whereDate('display_date', today())
            ->first();

        return response()->json(['data' => $verse]);
    }
}
