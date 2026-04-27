<?php

namespace App\Modules\Announcement\Services;

use App\Modules\Announcement\Repositories\AnnouncementRepository;

class AnnouncementService
{
    public function __construct(private readonly AnnouncementRepository $repository) {}

    public function listPublished(array $filters = []): array
    {
        return $this->repository->paginatePublished($filters);
    }

    public function findBySlug(string $slug)
    {
        return $this->repository->findBySlug($slug);
    }
}
