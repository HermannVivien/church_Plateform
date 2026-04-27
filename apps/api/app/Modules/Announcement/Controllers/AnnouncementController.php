<?php

namespace App\Modules\Announcement\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Announcement\Services\AnnouncementService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function __construct(private readonly AnnouncementService $service) {}

    public function index(Request $request): JsonResponse
    {
        return response()->json($this->service->listPublished($request->all()));
    }

    public function show(string $slug): JsonResponse
    {
        return response()->json($this->service->findBySlug($slug));
    }
}
