export interface PaginatedResponse<T> {
  data: T[];
  meta: {
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
  };
}

export interface ApiResponse<T> {
  data: T;
  message?: string;
}

export interface User {
  id: number;
  name: string;
  email: string;
  roles: string[];
  permissions: string[];
  avatar?: string;
  created_at: string;
}

export interface Announcement {
  id: number;
  title: string;
  slug: string;
  content: string;
  category?: string;
  status: 'draft' | 'published' | 'archived';
  published_at?: string;
  expires_at?: string;
  created_by: User;
  created_at: string;
}

export interface Sermon {
  id: number;
  title: string;
  slug: string;
  description?: string;
  type: 'video' | 'audio' | 'text';
  youtube_id?: string;
  audio_url?: string;
  content?: string;
  preacher: string;
  preached_at: string;
  thumbnail?: string;
  created_at: string;
}

export interface Clergy {
  id: number;
  name: string;
  role: 'pretre' | 'eveque' | 'diacre' | 'autre';
  bio?: string;
  photo?: string;
  parish?: string;
  order: number;
}

export interface Payment {
  id: number;
  reference: string;
  amount: number;
  currency: 'XOF';
  provider: 'orange_money' | 'mtn_momo' | 'wave';
  status: 'pending' | 'processing' | 'success' | 'failed' | 'refunded';
  paid_at?: string;
  created_at: string;
}

export interface MassRequest {
  id: number;
  requester_name: string;
  message: string;
  requested_date?: string;
  status: 'pending' | 'accepted' | 'completed';
  payment?: Payment;
  created_at: string;
}

export interface Verse {
  id: number;
  reference: string;
  content: string;
  display_date?: string;
}

export interface GalleryItem {
  id: number;
  title?: string;
  description?: string;
  media_url: string;
  type: 'image' | 'video';
  album?: string;
  order: number;
}
