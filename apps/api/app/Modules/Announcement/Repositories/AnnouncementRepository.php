<?php

namespace App\Modules\Announcement\Repositories;

use App\Modules\Announcement\Models\Announcement;

class AnnouncementRepository
{
    public function paginatePublished(array $filters = []): array
    {
        $query = Announcement::query()
            ->where('status', 'published')
            ->orderByDesc('published_at');

        if (! empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        $perPage = (int) ($filters['per_page'] ?? 15);
        $page = (int) ($filters['page'] ?? 1);

        return $query->paginate($perPage, ['*'], 'page', $page)->toArray();
    }

    public function findBySlug(string $slug): ?Announcement
    {
        return Announcement::where('slug', $slug)->where('status', 'published')->first();
    }
}
