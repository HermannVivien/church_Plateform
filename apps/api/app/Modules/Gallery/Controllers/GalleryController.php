<?php

namespace App\Modules\Gallery\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class GalleryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(['data' => []]);
    }
}
