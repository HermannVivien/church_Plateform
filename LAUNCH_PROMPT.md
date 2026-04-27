# 🚀 PROMPT DE LANCEMENT — Church Platform

> Copie ce prompt dans Claude Code, Cursor, ou tout agent IA pour initialiser le projet from scratch.

---

## CONTEXTE DU PROJET

Tu vas scaffolder un projet complet appelé **church-platform** — une plateforme web pour église catholique en Côte d'Ivoire. Le dossier cible est actuellement **vide**. Tu dois tout créer.

---

## MISSION

Génère la structure complète du monorepo, les fichiers de configuration, les bases du code, et prépare le projet pour un démarrage local immédiat.

---

## STACK TECHNIQUE

### Frontend (apps/web & apps/admin)
- **Next.js 14** (App Router)
- **TypeScript** (strict mode)
- **TailwindCSS** + **shadcn/ui**
- **React Query v5** (data fetching + cache)
- **Zustand** (state management)
- **Framer Motion** (animations)
- **React Hook Form** + **Zod** (formulaires + validation)
- **next-intl** (i18n : Français par défaut)
- **next-themes** (dark/light mode)

### Backend (apps/api)
- **Laravel 11**
- **PHP 8.3**
- **Laravel Sanctum** (auth SPA)
- **MySQL 8**
- **Redis** (cache + sessions + queues)
- **Laravel Horizon** (monitoring queues)
- **Laravel Telescope** (debugging local)
- **Laravel Reverb** (WebSockets natif)
- **Spatie Laravel Permission** (rôles & permissions)
- **Spatie Laravel Activity Log** (audit trail)
- **Spatie Laravel Media Library** (gestion médias)
- **Spatie Laravel Backup** (backups auto)

### Shared (packages/)
- **TypeScript** partagé
- **ESLint** config unifiée
- **Prettier** config unifiée
- **Design system** partagé (components Radix UI + Tailwind)

### Infrastructure
- **Docker Compose** (local)
- **Nginx** (reverse proxy)
- **GitHub Actions** (CI/CD)
- **Makefile** (commandes dev simplifiées)

---

## STRUCTURE À GÉNÉRER

```
church-platform/
│
├── apps/
│   ├── api/                    # Laravel 11
│   │   ├── app/
│   │   │   └── Modules/
│   │   │       ├── Auth/
│   │   │       │   ├── Controllers/
│   │   │       │   ├── Services/
│   │   │       │   ├── DTOs/
│   │   │       │   ├── Requests/
│   │   │       │   └── Routes/
│   │   │       ├── Announcement/
│   │   │       ├── Payment/
│   │   │       ├── MassRequest/
│   │   │       ├── Sermon/
│   │   │       ├── Clergy/
│   │   │       ├── Media/
│   │   │       ├── Gallery/
│   │   │       └── Verse/
│   │   ├── database/
│   │   │   ├── migrations/
│   │   │   └── seeders/
│   │   ├── routes/api.php
│   │   ├── config/
│   │   └── tests/
│   │
│   ├── web/                    # Next.js 14 — Site public
│   │   ├── app/
│   │   │   ├── (public)/
│   │   │   │   ├── page.tsx
│   │   │   │   ├── annonces/
│   │   │   │   ├── sermons/
│   │   │   │   ├── clergy/
│   │   │   │   ├── donations/
│   │   │   │   ├── live/
│   │   │   │   └── galerie/
│   │   │   ├── (auth)/
│   │   │   │   ├── login/
│   │   │   │   └── register/
│   │   │   ├── layout.tsx
│   │   │   ├── not-found.tsx
│   │   │   └── error.tsx
│   │   ├── components/
│   │   ├── services/
│   │   ├── hooks/
│   │   ├── lib/
│   │   ├── stores/
│   │   └── types/
│   │
│   └── admin/                  # Next.js 14 — CMS Dashboard
│       ├── app/
│       │   ├── (auth)/
│       │   │   └── login/
│       │   └── (dashboard)/
│       │       ├── layout.tsx
│       │       ├── page.tsx
│       │       ├── annonces/
│       │       ├── paiements/
│       │       ├── sermons/
│       │       ├── clergy/
│       │       ├── users/
│       │       ├── media/
│       │       ├── roles/
│       │       └── parametres/
│       ├── components/
│       ├── services/
│       ├── hooks/
│       └── lib/
│
├── packages/
│   ├── ui/                     # Design system partagé
│   │   ├── src/
│   │   │   ├── components/
│   │   │   │   ├── Button/
│   │   │   │   ├── Card/
│   │   │   │   ├── Input/
│   │   │   │   ├── Modal/
│   │   │   │   ├── Table/
│   │   │   │   ├── Badge/
│   │   │   │   ├── Avatar/
│   │   │   │   ├── Toast/
│   │   │   │   └── Spinner/
│   │   │   ├── hooks/
│   │   │   └── index.ts
│   │   └── package.json
│   │
│   ├── config/
│   │   ├── eslint/
│   │   ├── prettier/
│   │   ├── tsconfig/
│   │   └── tailwind/
│   │
│   ├── types/
│   │   ├── src/
│   │   │   ├── api.types.ts
│   │   │   ├── auth.types.ts
│   │   │   ├── announcement.types.ts
│   │   │   ├── payment.types.ts
│   │   │   ├── sermon.types.ts
│   │   │   ├── clergy.types.ts
│   │   │   └── index.ts
│   │   └── package.json
│   │
│   └── utils/
│       ├── src/
│       │   ├── formatDate.ts
│       │   ├── formatCurrency.ts    # FCFA
│       │   ├── cn.ts                # classnames helper
│       │   └── index.ts
│       └── package.json
│
├── infra/
│   ├── docker/
│   │   ├── nginx/
│   │   │   └── nginx.conf
│   │   ├── php/
│   │   │   └── Dockerfile
│   │   └── node/
│   │       └── Dockerfile
│   └── docker-compose.yml
│
├── .github/
│   └── workflows/
│       ├── ci.yml
│       └── deploy.yml
│
├── docs/
│   ├── architecture.md
│   ├── api-reference.md
│   └── setup.md
│
├── Makefile
├── .env.example
├── .gitignore
├── turbo.json
├── package.json                # root (pnpm workspaces)
└── README.md
```

---

## FICHIERS À GÉNÉRER EN PRIORITÉ

### 1. Root — Monorepo Config

**`package.json` (root)**
```json
{
  "name": "church-platform",
  "private": true,
  "scripts": {
    "dev": "turbo run dev",
    "build": "turbo run build",
    "lint": "turbo run lint",
    "test": "turbo run test",
    "format": "prettier --write \"**/*.{ts,tsx,js,jsx,json,md}\""
  },
  "devDependencies": {
    "turbo": "latest",
    "prettier": "^3.0.0",
    "typescript": "^5.4.0"
  },
  "packageManager": "pnpm@9.0.0"
}
```

**`turbo.json`**
```json
{
  "$schema": "https://turbo.build/schema.json",
  "tasks": {
    "build": { "dependsOn": ["^build"], "outputs": [".next/**", "dist/**"] },
    "dev": { "cache": false, "persistent": true },
    "lint": { "outputs": [] },
    "test": { "outputs": ["coverage/**"] }
  }
}
```

**`pnpm-workspace.yaml`**
```yaml
packages:
  - "apps/*"
  - "packages/*"
```

---

### 2. Docker Compose

**`infra/docker-compose.yml`**
```yaml
version: '3.9'

services:
  nginx:
    image: nginx:alpine
    ports:
      - "80:80"
      - "443:443"
    volumes:
      - ./docker/nginx/nginx.conf:/etc/nginx/conf.d/default.conf
    depends_on:
      - api
      - web
      - admin

  api:
    build:
      context: ../../apps/api
      dockerfile: ../../infra/docker/php/Dockerfile
    volumes:
      - ../../apps/api:/var/www/html
    environment:
      - APP_ENV=local
    depends_on:
      - mysql
      - redis

  web:
    build:
      context: ../../apps/web
      dockerfile: ../../infra/docker/node/Dockerfile
    ports:
      - "3000:3000"
    volumes:
      - ../../apps/web:/app

  admin:
    build:
      context: ../../apps/admin
      dockerfile: ../../infra/docker/node/Dockerfile
    ports:
      - "3001:3001"
    volumes:
      - ../../apps/admin:/app

  mysql:
    image: mysql:8.0
    environment:
      MYSQL_ROOT_PASSWORD: ${DB_ROOT_PASSWORD:-secret}
      MYSQL_DATABASE: ${DB_DATABASE:-church_platform}
      MYSQL_USER: ${DB_USERNAME:-church_user}
      MYSQL_PASSWORD: ${DB_PASSWORD:-secret}
    ports:
      - "3306:3306"
    volumes:
      - mysql_data:/var/lib/mysql

  redis:
    image: redis:alpine
    ports:
      - "6379:6379"
    volumes:
      - redis_data:/data

  mailpit:
    image: axllent/mailpit
    ports:
      - "1025:1025"
      - "8025:8025"

volumes:
  mysql_data:
  redis_data:
```

---

### 3. Laravel — Migrations prioritaires

Génère ces migrations dans `apps/api/database/migrations/` :

```
- 2024_01_01_000001_create_users_table.php
- 2024_01_01_000002_create_roles_permissions_tables.php  (via Spatie)
- 2024_01_01_000003_create_announcements_table.php
- 2024_01_01_000004_create_sermons_table.php
- 2024_01_01_000005_create_clergy_table.php
- 2024_01_01_000006_create_mass_requests_table.php
- 2024_01_01_000007_create_payments_table.php
- 2024_01_01_000008_create_verses_table.php
- 2024_01_01_000009_create_gallery_items_table.php
```

**Schema `announcements` :**
```php
Schema::create('announcements', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('content');
    $table->string('category')->nullable();
    $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
    $table->timestamp('published_at')->nullable();
    $table->timestamp('expires_at')->nullable();
    $table->foreignId('created_by')->constrained('users');
    $table->timestamps();
    $table->softDeletes();
});
```

**Schema `payments` :**
```php
Schema::create('payments', function (Blueprint $table) {
    $table->id();
    $table->string('reference')->unique();
    $table->foreignId('user_id')->nullable()->constrained();
    $table->morphs('payable'); // polymorphique : MassRequest, Event, Donation
    $table->decimal('amount', 12, 2);
    $table->string('currency', 3)->default('XOF'); // Franc CFA
    $table->enum('provider', ['orange_money', 'mtn_momo', 'wave']);
    $table->enum('status', ['pending', 'processing', 'success', 'failed', 'refunded'])->default('pending');
    $table->string('provider_reference')->nullable();
    $table->json('metadata')->nullable();
    $table->timestamp('paid_at')->nullable();
    $table->timestamps();
});
```

---

### 4. Laravel — Module Auth (exemple de pattern à reproduire pour tous les modules)

**`app/Modules/Auth/Controllers/AuthController.php`**
```php
<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\DTOs\LoginDTO;
use App\Modules\Auth\DTOs\RegisterDTO;
use App\Modules\Auth\Requests\LoginRequest;
use App\Modules\Auth\Requests\RegisterRequest;
use App\Modules\Auth\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService) {}

    public function login(LoginRequest $request): JsonResponse
    {
        $dto = LoginDTO::fromRequest($request);
        $result = $this->authService->login($dto);
        return response()->json($result);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $dto = RegisterDTO::fromRequest($request);
        $result = $this->authService->register($dto);
        return response()->json($result, 201);
    }

    public function logout(): JsonResponse
    {
        $this->authService->logout();
        return response()->json(['message' => 'Déconnecté avec succès']);
    }

    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }
}
```

**`app/Modules/Auth/DTOs/LoginDTO.php`**
```php
<?php

namespace App\Modules\Auth\DTOs;

use Illuminate\Http\Request;

readonly class LoginDTO
{
    public function __construct(
        public string $email,
        public string $password,
        public bool $remember = false,
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            email: $request->validated('email'),
            password: $request->validated('password'),
            remember: $request->boolean('remember'),
        );
    }
}
```

---

### 5. API Routes

**`routes/api.php`**
```php
<?php

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
            Route::apiResource('announcements', Admin\AnnouncementController::class);
            Route::apiResource('sermons', Admin\SermonController::class);
            Route::apiResource('clergy', Admin\ClergyController::class);
            Route::apiResource('users', Admin\UserController::class);
            Route::get('payments', [Admin\PaymentController::class, 'index']);
            Route::get('dashboard/stats', [Admin\DashboardController::class, 'stats']);
        });
    });

    // Webhooks paiement (sans auth)
    Route::post('/webhooks/orange-money', [WebhookController::class, 'orangeMoney']);
    Route::post('/webhooks/mtn-momo', [WebhookController::class, 'mtnMomo']);
    Route::post('/webhooks/wave', [WebhookController::class, 'wave']);
});
```

---

### 6. Next.js — API Service Layer

**`apps/web/services/api.ts`**
```typescript
import axios from 'axios';

export const api = axios.create({
  baseURL: process.env.NEXT_PUBLIC_API_URL + '/api/v1',
  withCredentials: true,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  },
});

// Request interceptor
api.interceptors.request.use((config) => {
  const token = localStorage.getItem('auth_token');
  if (token) config.headers.Authorization = `Bearer ${token}`;
  return config;
});

// Response interceptor
api.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response?.status === 401) {
      window.location.href = '/login';
    }
    return Promise.reject(error);
  }
);
```

**`apps/web/services/announcements.service.ts`**
```typescript
import { api } from './api';
import type { Announcement, PaginatedResponse } from '@church/types';

export const announcementsService = {
  getAll: (params?: { page?: number; category?: string }) =>
    api.get<PaginatedResponse<Announcement>>('/announcements', { params }),

  getBySlug: (slug: string) =>
    api.get<Announcement>(`/announcements/${slug}`),
};
```

---

### 7. Types partagés

**`packages/types/src/index.ts`**
```typescript
// Pagination
export interface PaginatedResponse<T> {
  data: T[];
  meta: {
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
  };
}

// API Response wrapper
export interface ApiResponse<T> {
  data: T;
  message?: string;
}

// Auth
export interface User {
  id: number;
  name: string;
  email: string;
  roles: string[];
  permissions: string[];
  avatar?: string;
  created_at: string;
}

// Announcement
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

// Sermon
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

// Clergy
export interface Clergy {
  id: number;
  name: string;
  role: 'pretre' | 'eveque' | 'diacre' | 'autre';
  bio?: string;
  photo?: string;
  parish?: string;
  order: number;
}

// Payment
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

// MassRequest
export interface MassRequest {
  id: number;
  requester_name: string;
  message: string;
  requested_date?: string;
  status: 'pending' | 'accepted' | 'completed';
  payment?: Payment;
  created_at: string;
}
```

---

### 8. Makefile — Commandes dev

**`Makefile`**
```makefile
.PHONY: help install dev build test lint migrate seed fresh logs shell-api shell-web

help: ## Affiche l'aide
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

install: ## Installe toutes les dépendances
	pnpm install
	cd apps/api && composer install

dev: ## Lance l'environnement de développement
	docker-compose -f infra/docker-compose.yml up -d
	pnpm dev

build: ## Build tous les projets
	pnpm build

test: ## Lance les tests
	pnpm test
	cd apps/api && php artisan test

lint: ## Lint tous les projets
	pnpm lint
	cd apps/api && ./vendor/bin/pint

migrate: ## Lance les migrations Laravel
	docker-compose -f infra/docker-compose.yml exec api php artisan migrate

seed: ## Lance les seeders
	docker-compose -f infra/docker-compose.yml exec api php artisan db:seed

fresh: ## Reset DB + migrate + seed
	docker-compose -f infra/docker-compose.yml exec api php artisan migrate:fresh --seed

logs: ## Affiche les logs Docker
	docker-compose -f infra/docker-compose.yml logs -f

shell-api: ## Shell dans le conteneur API
	docker-compose -f infra/docker-compose.yml exec api bash

shell-web: ## Shell dans le conteneur Web
	docker-compose -f infra/docker-compose.yml exec web sh

stop: ## Arrête les conteneurs
	docker-compose -f infra/docker-compose.yml down

reset: ## Reset complet (DANGER)
	docker-compose -f infra/docker-compose.yml down -v
```

---

### 9. GitHub Actions CI

**`.github/workflows/ci.yml`**
```yaml
name: CI

on:
  push:
    branches: [main, dev]
  pull_request:
    branches: [main, dev]

jobs:
  lint-frontend:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - uses: pnpm/action-setup@v3
        with: { version: 9 }
      - uses: actions/setup-node@v4
        with: { node-version: 20, cache: pnpm }
      - run: pnpm install --frozen-lockfile
      - run: pnpm lint
      - run: pnpm build

  test-backend:
    runs-on: ubuntu-latest
    services:
      mysql:
        image: mysql:8.0
        env:
          MYSQL_ROOT_PASSWORD: secret
          MYSQL_DATABASE: church_test
        options: >-
          --health-cmd="mysqladmin ping"
          --health-interval=10s
    steps:
      - uses: actions/checkout@v4
      - uses: shivammathur/setup-php@v2
        with: { php-version: '8.3', extensions: mbstring, pdo, pdo_mysql }
      - run: cd apps/api && composer install --no-interaction
      - run: cd apps/api && cp .env.testing .env && php artisan key:generate
      - run: cd apps/api && php artisan test --parallel
```

---

## CHECKLIST D'INITIALISATION LOCALE

Après génération, exécuter dans l'ordre :

```bash
# 1. Init git
git init && git add . && git commit -m "chore: initial scaffold"

# 2. Installer les dépendances JS
pnpm install

# 3. Installer les dépendances PHP
cd apps/api && composer install

# 4. Configurer les .env
cp .env.example .env
cp apps/api/.env.example apps/api/.env
cd apps/api && php artisan key:generate

# 5. Lancer Docker
docker-compose -f infra/docker-compose.yml up -d

# 6. Migrations & seeds
make migrate && make seed

# 7. Lancer le dev
pnpm dev
```

---

## RÈGLES DE DÉVELOPPEMENT OBLIGATOIRES

1. **Fichiers < 300 lignes** — si dépasse, découper
2. **Pas de logique dans les Controllers** — tout passe par les Services
3. **DTOs obligatoires** pour tous les transferts de données
4. **Repository Pattern** — pas d'Eloquent direct dans les Services
5. **FormRequest Laravel** pour toute validation
6. **React Query** pour tout data fetching côté Next.js
7. **Zustand** uniquement pour l'état global UI (auth, theme, notifications)
8. **Zod** pour toute validation côté client
9. **Transactions DB** pour les paiements (obligatoire)
10. **Queue Jobs** pour : envoi d'emails, callbacks paiement, notifications push

---

## SEEDS DE DÉMARRAGE

Créer ces seeders pour avoir des données de test :
- `AdminUserSeeder` — 1 super admin + 1 editeur
- `RolesAndPermissionsSeeder` — rôles : super_admin, admin, editor, viewer
- `AnnouncementSeeder` — 10 annonces (mix draft/published)
- `SermonSeeder` — 5 sermons avec YouTube IDs réels
- `ClergySeeder` — 3 membres du clergé
- `VerseSeeder` — 30 versets
