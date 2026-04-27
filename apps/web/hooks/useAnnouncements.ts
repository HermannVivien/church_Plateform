import { useQuery } from '@tanstack/react-query';
import { announcementsService } from '@/services/announcements.service';

export function useAnnouncements(params?: { page?: number; category?: string }) {
  return useQuery({
    queryKey: ['announcements', params],
    queryFn: () => announcementsService.getAll(params).then((r) => r.data),
  });
}

export function useAnnouncement(slug: string) {
  return useQuery({
    queryKey: ['announcement', slug],
    queryFn: () => announcementsService.getBySlug(slug).then((r) => r.data),
    enabled: !!slug,
  });
}
