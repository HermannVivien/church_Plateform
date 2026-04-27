# ⛪ Church Platform

> Plateforme web complète pour paroisse catholique — Côte d'Ivoire  
> Annonces · Sermons · Clergé · Dons · Intentions de messe · Live

[![CI](https://github.com/your-org/church-platform/actions/workflows/ci.yml/badge.svg)](https://github.com/your-org/church-platform/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-8.3-8892BF.svg)](https://php.net)
[![Next.js](https://img.shields.io/badge/Next.js-14-black.svg)](https://nextjs.org)
[![TypeScript](https://img.shields.io/badge/TypeScript-5.4-3178C6.svg)](https://typescriptlang.org)

---

## 📋 Table des matières

- [Vue d'ensemble](#vue-densemble)
- [Architecture](#architecture)
- [Stack technique](#stack-technique)
- [Démarrage rapide](#démarrage-rapide)
- [Structure du projet](#structure-du-projet)
- [Modules backend](#modules-backend)
- [API Reference](#api-reference)
- [Paiements mobiles (CI)](#paiements-mobiles-ci)
- [Variables d'environnement](#variables-denvironnement)
- [Tests](#tests)
- [Déploiement](#déploiement)
- [Contribution](#contribution)
- [Roadmap](#roadmap)

---

## Vue d'ensemble

**Church Platform** est une solution web full-stack dédiée aux paroisses catholiques en Côte d'Ivoire. Elle permet de gérer et diffuser le contenu paroissial tout en offrant aux fidèles un accès simple aux services essentiels : annonces, sermons, intentions de messe, et dons via Mobile Money.

### Fonctionnalités principales

| Module | Description | Phase |
|--------|-------------|-------|
| 📢 Annonces | CRUD, catégories, publication programmée | MVP |
| 🎙️ Sermons | Vidéos YouTube, audios, textes | MVP |
| 🧑‍⚖️ Clergé | Profils prêtres / évêques | MVP |
| 🙏 Intentions de messe | Formulaire + paiement associé | Phase 2 |
| 💳 Dons & paiements | Orange Money, MTN MoMo, Wave | Phase 2 |
| 📡 Live | Intégration YouTube Live | Phase 3 |
| 📖 Verset du jour | Gestion interne | MVP |
| 🖼️ Galerie | Photos & vidéos | MVP |
| 🛠️ CMS Admin | Dashboard complet + rôles | MVP |

---

## Architecture

```
church-platform/                    # Monorepo (pnpm workspaces + Turborepo)
│
├── apps/
│   ├── api/                        # Backend Laravel 11 (port 8000)
│   ├── web/                        # Site public Next.js 14 (port 3000)
│   └── admin/                      # Dashboard CMS Next.js 14 (port 3001)
│
├── packages/
│   ├── ui/                         # Design system partagé
│   ├── types/                      # Types TypeScript partagés
│   ├── utils/                      # Fonctions utilitaires
│   └── config/                     # Configs ESLint / Prettier / TS
│
├── infra/
│   ├── docker-compose.yml          # Stack locale complète
│   └── docker/                     # Dockerfiles par service
│
└── .github/workflows/              # CI/CD GitHub Actions
```

### Diagramme des services (local)

```
Browser
  │
  ▼
Nginx (port 80)
  ├── / → web:3000 (site public)
  ├── /admin → admin:3001 (CMS)
  └── /api → api:8000 (Laravel)
              │
              ├── MySQL 8.0 (port 3306)
              ├── Redis (port 6379)
              └── Mailpit (port 8025)
```

---

## Stack technique

### Frontend
| Technologie | Version | Usage |
|-------------|---------|-------|
| Next.js | 14 | Framework React (App Router) |
| TypeScript | 5.4 | Typage statique |
| TailwindCSS | 3.4 | Styling utilitaire |
| shadcn/ui | latest | Composants UI accessibles |
| React Query | 5 | Data fetching + cache |
| Zustand | 4 | State management |
| Framer Motion | 11 | Animations |
| React Hook Form | 7 | Gestion formulaires |
| Zod | 3 | Validation schémas |
| next-intl | 3 | Internationalisation (FR) |
| Axios | 1.6 | Client HTTP |

### Backend
| Technologie | Version | Usage |
|-------------|---------|-------|
| Laravel | 11 | Framework PHP |
| PHP | 8.3 | Langage backend |
| MySQL | 8.0 | Base de données principale |
| Redis | 7 | Cache + Sessions + Queues |
| Laravel Sanctum | 4 | Authentification SPA |
| Laravel Horizon | 5 | Monitoring queues (Redis) |
| Laravel Telescope | 5 | Debug local |
| Laravel Reverb | 1 | WebSockets natif |
| Spatie Permission | 6 | Rôles & permissions |
| Spatie Media Library | 11 | Upload & gestion médias |
| Spatie Activity Log | 4 | Audit trail |
| Spatie Backup | 8 | Backups automatiques |

### Infrastructure
| Outil | Usage |
|-------|-------|
| Docker + Docker Compose | Environnement local |
| Nginx | Reverse proxy |
| GitHub Actions | CI/CD |
| Turborepo | Build orchestration monorepo |
| pnpm | Package manager JS |
| Composer | Package manager PHP |

---

## Démarrage rapide

### Prérequis

- **Node.js** >= 20.0.0
- **pnpm** >= 9.0.0 (`npm install -g pnpm`)
- **PHP** >= 8.3
- **Composer** >= 2.7
- **Docker** + **Docker Compose** >= 2.0
- **Git**

### Installation

```bash
# 1. Cloner le repo
git clone https://github.com/your-org/church-platform.git
cd church-platform

# 2. Installer les dépendances JS (tous les packages)
pnpm install

# 3. Installer les dépendances PHP
cd apps/api && composer install && cd ../..

# 4. Configurer les variables d'environnement
cp .env.example .env
cp apps/api/.env.example apps/api/.env
cp apps/web/.env.example apps/web/.env.local
cp apps/admin/.env.example apps/admin/.env.local

# 5. Générer la clé Laravel
cd apps/api && php artisan key:generate && cd ../..

# 6. Lancer Docker (MySQL, Redis, Mailpit, Nginx)
docker-compose -f infra/docker-compose.yml up -d

# 7. Attendre que MySQL soit prêt (~10s), puis migrer
make migrate

# 8. Peupler la base avec des données de test
make seed

# 9. Lancer tous les serveurs de développement
pnpm dev
```

### URLs locales

| Service | URL |
|---------|-----|
| Site public | http://localhost:3000 |
| Admin CMS | http://localhost:3001 |
| API Laravel | http://localhost:8000/api/v1 |
| Mailpit (emails) | http://localhost:8025 |
| Laravel Telescope | http://localhost:8000/telescope |
| Laravel Horizon | http://localhost:8000/horizon |

### Comptes de test (après `make seed`)

| Rôle | Email | Mot de passe |
|------|-------|--------------|
| Super Admin | admin@paroisse.ci | password |
| Éditeur | editeur@paroisse.ci | password |
| Fidèle | fidele@paroisse.ci | password |

---

## Structure du projet

### Backend Laravel — Architecture modulaire

Le backend suit un pattern DDD simplifié. Chaque domaine métier est isolé dans son propre module.

```
apps/api/app/Modules/
│
├── Auth/                   # Authentification & tokens
│   ├── Controllers/
│   │   └── AuthController.php
│   ├── Services/
│   │   └── AuthService.php
│   ├── Repositories/
│   │   └── UserRepository.php
│   ├── DTOs/
│   │   ├── LoginDTO.php
│   │   └── RegisterDTO.php
│   ├── Requests/
│   │   ├── LoginRequest.php
│   │   └── RegisterRequest.php
│   └── Routes/
│       └── auth.php
│
├── Announcement/           # Annonces paroissiales
│   ├── Controllers/
│   │   ├── AnnouncementController.php    # Public
│   │   └── Admin/AnnouncementController.php  # Admin
│   ├── Models/
│   │   └── Announcement.php
│   ├── Services/
│   │   └── AnnouncementService.php
│   ├── Repositories/
│   │   └── AnnouncementRepository.php
│   ├── DTOs/
│   │   └── AnnouncementDTO.php
│   ├── Requests/
│   │   ├── StoreAnnouncementRequest.php
│   │   └── UpdateAnnouncementRequest.php
│   └── Policies/
│       └── AnnouncementPolicy.php
│
├── Payment/                # Paiements Mobile Money
│   ├── Controllers/
│   ├── Services/
│   │   ├── PaymentService.php
│   │   ├── Providers/
│   │   │   ├── OrangeMoneyProvider.php
│   │   │   ├── MTNMomoProvider.php
│   │   │   └── WaveProvider.php
│   │   └── Contracts/
│   │       └── PaymentProviderInterface.php
│   ├── Jobs/
│   │   ├── ProcessPaymentWebhook.php
│   │   └── SendPaymentConfirmation.php
│   └── Events/
│       ├── PaymentCompleted.php
│       └── PaymentFailed.php
│
├── MassRequest/            # Intentions de messe
├── Sermon/                 # Sermons (vidéo/audio/texte)
├── Clergy/                 # Membres du clergé
├── Media/                  # Upload & gestion médias
├── Gallery/                # Galerie photos/vidéos
└── Verse/                  # Verset du jour
```

**Règle de dépendance :** `Controller → Service → Repository → Model`  
Les Controllers ne contiennent **aucune logique métier**.

### Frontend Next.js — Site public

```
apps/web/
├── app/
│   ├── (public)/               # Routes publiques (sans layout auth)
│   │   ├── page.tsx            # Accueil
│   │   ├── annonces/
│   │   │   ├── page.tsx        # Liste des annonces
│   │   │   └── [slug]/page.tsx # Détail annonce
│   │   ├── sermons/
│   │   │   ├── page.tsx
│   │   │   └── [slug]/page.tsx
│   │   ├── clergy/page.tsx
│   │   ├── donations/page.tsx
│   │   ├── intentions/page.tsx # Intentions de messe
│   │   ├── live/page.tsx
│   │   └── galerie/page.tsx
│   ├── (auth)/
│   │   ├── login/page.tsx
│   │   └── register/page.tsx
│   ├── layout.tsx
│   ├── not-found.tsx
│   ├── error.tsx
│   └── loading.tsx
│
├── components/
│   ├── layout/
│   │   ├── Header.tsx
│   │   ├── Footer.tsx
│   │   └── Navigation.tsx
│   ├── announcements/
│   ├── sermons/
│   ├── clergy/
│   ├── donations/
│   └── shared/
│
├── services/               # Appels API (axios)
│   ├── api.ts              # Instance axios configurée
│   ├── announcements.service.ts
│   ├── sermons.service.ts
│   ├── payments.service.ts
│   └── auth.service.ts
│
├── hooks/                  # React Query hooks
│   ├── useAnnouncements.ts
│   ├── useSermons.ts
│   └── useAuth.ts
│
├── stores/                 # Zustand stores
│   ├── useAuthStore.ts
│   └── useCartStore.ts     # Panier dons
│
└── lib/
    ├── queryClient.ts      # Config React Query
    └── validations/        # Schémas Zod
```

---

## Modules backend

### Module Payment — Architecture détaillée

Les paiements utilisent un pattern Strategy pour supporter plusieurs opérateurs.

```php
// Contrat commun
interface PaymentProviderInterface {
    public function initiate(PaymentDTO $dto): InitiateResponse;
    public function verify(string $reference): VerifyResponse;
    public function refund(string $reference, float $amount): RefundResponse;
}

// Utilisation dans le service
class PaymentService {
    public function initiate(PaymentDTO $dto): Payment {
        $provider = $this->resolveProvider($dto->provider);
        $response = $provider->initiate($dto);
        
        return DB::transaction(function () use ($dto, $response) {
            $payment = Payment::create([...]);
            ProcessPaymentWebhook::dispatch($payment)->delay(30);
            return $payment;
        });
    }
}
```

**Flux de paiement :**
1. Client appelle `POST /api/v1/donations`
2. Service crée un paiement en `pending`
3. Redirection vers interface opérateur (Orange Money, MTN, Wave)
4. Webhook reçu sur `/api/v1/webhooks/{provider}`
5. Job `ProcessPaymentWebhook` mis en queue
6. Mise à jour statut + envoi email de confirmation

### Module Auth — Rôles & Permissions

```
Rôles disponibles :
├── super_admin     → Accès total (irréversible)
├── admin           → Gestion contenu + utilisateurs
├── editor          → Création/modification contenu
└── viewer          → Lecture seule (espace fidèles)

Permissions par module :
├── announcements   → [view, create, edit, delete, publish]
├── sermons         → [view, create, edit, delete]
├── payments        → [view, refund]
├── users           → [view, create, edit, delete]
└── settings        → [view, edit]
```

---

## API Reference

### Authentification

```http
POST /api/v1/auth/login
Content-Type: application/json

{
  "email": "admin@paroisse.ci",
  "password": "password"
}

→ 200 OK
{
  "data": {
    "user": { "id": 1, "name": "...", "roles": ["admin"] },
    "token": "1|abc123..."
  }
}
```

### Annonces

```http
# Liste paginée
GET /api/v1/announcements?page=1&category=liturgie&per_page=10

# Détail
GET /api/v1/announcements/{slug}

# Créer (auth + rôle admin/editor)
POST /api/v1/admin/announcements
Authorization: Bearer {token}
{
  "title": "...",
  "content": "...",
  "category": "liturgie",
  "status": "published",
  "published_at": "2024-12-25T08:00:00Z"
}
```

### Initier un don

```http
POST /api/v1/donations
Authorization: Bearer {token}
{
  "amount": 5000,
  "provider": "orange_money",
  "phone": "0709000000",
  "note": "Pour les pauvres"
}

→ 201 Created
{
  "data": {
    "reference": "DON-2024-XXXXX",
    "redirect_url": "https://...",
    "status": "pending"
  }
}
```

---

## Paiements mobiles (CI)

### Opérateurs supportés

| Opérateur | Type | Coverage CI | Devise |
|-----------|------|-------------|--------|
| Orange Money | API REST | National | XOF (FCFA) |
| MTN Mobile Money | API REST | National | XOF (FCFA) |
| Wave | API REST | National | XOF (FCFA) |

### Configuration Orange Money

```env
ORANGE_MONEY_API_URL=https://api.orange.com/orange-money-webpay/ci/v1
ORANGE_MONEY_CLIENT_ID=your_client_id
ORANGE_MONEY_CLIENT_SECRET=your_client_secret
ORANGE_MONEY_MERCHANT_KEY=your_merchant_key
ORANGE_MONEY_WEBHOOK_SECRET=your_webhook_secret
```

### Montants minimum

| Opérateur | Minimum | Maximum |
|-----------|---------|---------|
| Orange Money | 100 XOF | 2 000 000 XOF |
| MTN MoMo | 100 XOF | 5 000 000 XOF |
| Wave | 1 XOF | 5 000 000 XOF |

---

## Variables d'environnement

### `.env` (root)

```env
# Environnement
NODE_ENV=development

# URLs des services
NEXT_PUBLIC_API_URL=http://localhost:8000
NEXT_PUBLIC_APP_URL=http://localhost:3000
NEXT_PUBLIC_ADMIN_URL=http://localhost:3001
```

### `apps/api/.env`

```env
APP_NAME="Church Platform"
APP_ENV=local
APP_KEY=                        # généré par php artisan key:generate
APP_DEBUG=true
APP_URL=http://localhost:8000
APP_LOCALE=fr
APP_TIMEZONE=Africa/Abidjan

# Base de données
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=church_platform
DB_USERNAME=church_user
DB_PASSWORD=secret

# Redis
REDIS_HOST=127.0.0.1
REDIS_PORT=6379

# Mail (Mailpit en local)
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_FROM_ADDRESS=noreply@paroisse.ci
MAIL_FROM_NAME="Paroisse"

# Queue
QUEUE_CONNECTION=redis
BROADCAST_DRIVER=reverb

# Sanctum
SANCTUM_STATEFUL_DOMAINS=localhost:3000,localhost:3001

# Paiements
ORANGE_MONEY_CLIENT_ID=
ORANGE_MONEY_CLIENT_SECRET=
ORANGE_MONEY_MERCHANT_KEY=
MTN_MOMO_API_USER=
MTN_MOMO_API_KEY=
MTN_MOMO_SUBSCRIPTION_KEY=
WAVE_API_KEY=
WAVE_WEBHOOK_SECRET=

# Médias
MEDIA_DISK=local                # local | s3 (production)
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=

# Telescope (désactiver en prod)
TELESCOPE_ENABLED=true
```

---

## Tests

### Backend (PHPUnit / Pest)

```bash
# Tous les tests
cd apps/api && php artisan test

# Avec coverage
php artisan test --coverage

# Tests parallèles
php artisan test --parallel

# Un seul module
php artisan test --filter AnnouncementTest
```

**Structure des tests :**
```
apps/api/tests/
├── Unit/
│   ├── Services/
│   │   ├── PaymentServiceTest.php
│   │   └── AnnouncementServiceTest.php
│   └── DTOs/
├── Feature/
│   ├── Auth/
│   ├── Announcements/
│   ├── Payments/
│   └── MassRequests/
└── Pest.php
```

### Frontend (Vitest + Testing Library)

```bash
# Tous les tests
pnpm test

# Mode watch
pnpm test:watch

# Coverage
pnpm test:coverage
```

---

## Déploiement

### Stack de production recommandée

| Service | Recommandation | Alternative |
|---------|---------------|-------------|
| Hébergeur PHP | Laravel Forge + VPS | Render, Railway |
| Frontend | Vercel | Netlify, Cloudflare Pages |
| Base de données | MySQL 8 managé | PlanetScale |
| Redis | Redis Cloud | Upstash |
| Médias | Cloudflare R2 | AWS S3 |
| Emails | Resend | Mailgun |
| CDN | Cloudflare | |

### Variables à changer en production

```env
APP_ENV=production
APP_DEBUG=false
TELESCOPE_ENABLED=false
QUEUE_CONNECTION=redis
CACHE_DRIVER=redis
SESSION_DRIVER=redis
MEDIA_DISK=s3
```

### Commandes de déploiement

```bash
# Backend
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# Frontend
pnpm build
```

---

## Contribution

### Workflow Git

```
main          → Production (protection obligatoire)
dev           → Intégration (branche de base pour les PRs)
feature/*     → Nouvelles fonctionnalités
fix/*         → Corrections de bugs
hotfix/*      → Corrections urgentes en production
```

### Convention de commits (Conventional Commits)

```
feat(announcements): add scheduled publication
fix(payment): handle Orange Money timeout
docs(api): update authentication endpoints
chore(deps): upgrade Laravel to 11.5
test(sermon): add unit tests for SermonService
refactor(auth): extract token refresh logic
```

### Créer une feature

```bash
git checkout dev
git pull origin dev
git checkout -b feature/nom-de-la-feature
# ... développement ...
git add .
git commit -m "feat(module): description courte"
git push origin feature/nom-de-la-feature
# → Ouvrir une Pull Request vers dev
```

### Standards de code

- **PHP :** Laravel Pint (PSR-12) — `./vendor/bin/pint`
- **TypeScript :** ESLint + Prettier — `pnpm lint && pnpm format`
- **Commits :** Conventional Commits obligatoires
- **PRs :** Revue de code obligatoire avant merge sur `main`

---

## Roadmap

### ✅ Phase 1 — MVP (Semaines 1-4)
- [x] Architecture monorepo + Docker
- [ ] Authentification (Laravel Sanctum + Next.js)
- [ ] Module Annonces (CRUD + publication programmée)
- [ ] Module Sermons (YouTube embed + audio)
- [ ] Module Clergé (profils)
- [ ] Verset du jour
- [ ] Galerie basique
- [ ] CMS Admin (dashboard + gestion contenu)
- [ ] Design system partagé

### 🚧 Phase 2 — Paiements (Semaines 5-8)
- [ ] Intégration Orange Money CI
- [ ] Intégration MTN Mobile Money
- [ ] Intégration Wave
- [ ] Module Intentions de messe + paiement
- [ ] Dons libres
- [ ] Tableau de bord paiements admin
- [ ] Emails de confirmation

### 🔮 Phase 3 — Live & Plus (Semaines 9-12)
- [ ] Intégration YouTube Live
- [ ] Notifications push (PWA)
- [ ] Application mobile (React Native)
- [ ] Analytics avancées
- [ ] Export PDF (bulletins paroissiaux)
- [ ] Multi-paroisse

---

## Licence

MIT © 2024 — Church Platform

---

> **Fait avec ❤️ pour les paroisses catholiques de Côte d'Ivoire**
