<?php

use App\Modules\Auth\Controllers\AuthController;
use App\Modules\Announcement\Controllers\AnnouncementController;
use App\Modules\Sermon\Controllers\SermonController;
use App\Modules\Clergy\Controllers\ClergyController;
use App\Modules\Verse\Controllers\VerseController;
use App\Modules\Gallery\Controllers\GalleryController;
use App\Modules\MassRequest\Controllers\MassRequestController;
use App\Modules\Payment\Controllers\PaymentController;
use App\Modules\Payment\Controllers\WebhookController;
use App\Modules\Announcement\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Modules\Sermon\Controllers\Admin\SermonController as AdminSermonController;
use App\Modules\Clergy\Controllers\Admin\ClergyController as AdminClergyController;
use App\Modules\Auth\Controllers\Admin\UserController as AdminUserController;
use App\Modules\Payment\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Modules\Payment\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Auth
    Route::prefix('auth')->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::get('/me', [AuthController::class, 'me']);
        });
    });

    // Public routes
    Route::get('/announcements', [AnnouncementController::class, 'index']);
    Route::get('/announcements/{slug}', [AnnouncementController::class, 'show']);
    Route::get('/sermons', [SermonController::class, 'index']);
    Route::get('/clergy', [ClergyController::class, 'index']);
    Route::get('/verse/today', [VerseController::class, 'today']);
    Route::get('/gallery', [GalleryController::class, 'index']);

    // Auth required
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/mass-requests', [MassRequestController::class, 'store']);
        Route::post('/donations', [PaymentController::class, 'initDonation']);
        Route::get('/payments/{reference}/status', [PaymentController::class, 'status']);

        // Admin only
        Route::middleware('role:admin|editor')->prefix('admin')->group(function () {
            Route::apiResource('announcements', AdminAnnouncementController::class);
            Route::apiResource('sermons', AdminSermonController::class);
            Route::apiResource('clergy', AdminClergyController::class);
            Route::apiResource('users', AdminUserController::class);
            Route::get('payments', [AdminPaymentController::class, 'index']);
            Route::get('dashboard/stats', [AdminDashboardController::class, 'stats']);
        });
    });

    // Webhooks paiement
    Route::post('/webhooks/orange-money', [WebhookController::class, 'orangeMoney']);
    Route::post('/webhooks/mtn-momo', [WebhookController::class, 'mtnMomo']);
    Route::post('/webhooks/wave', [WebhookController::class, 'wave']);
});
