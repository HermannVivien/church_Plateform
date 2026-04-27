import type { User } from '@church/types';
import { api } from './api';

export const authService = {
  login: (email: string, password: string) =>
    api.post<{ user: User; token: string }>('/auth/login', { email, password }),

  register: (data: { name: string; email: string; password: string; password_confirmation: string }) =>
    api.post<{ user: User; token: string }>('/auth/register', data),

  logout: () => api.post('/auth/logout'),

  me: () => api.get<User>('/auth/me'),
};
