import type { Announcement, PaginatedResponse } from '@church/types';
import { api } from './api';

export const announcementsService = {
  getAll: (params?: { page?: number; category?: string }) =>
    api.get<PaginatedResponse<Announcement>>('/announcements', { params }),

  getBySlug: (slug: string) =>
    api.get<Announcement>(`/announcements/${slug}`),
};
