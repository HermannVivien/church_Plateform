# Architecture

## Vue d'ensemble

Monorepo `pnpm` + `turbo` regroupant :

- **apps/api** — Laravel 11 (PHP 8.3) — API JSON sous `/api/v1`
- **apps/web** — Next.js 14 (App Router) — site public (port 3000)
- **apps/admin** — Next.js 14 (App Router) — CMS dashboard (port 3001)
- **packages/types** — types TypeScript partagés
- **packages/ui** — design system (Radix + Tailwind)
- **packages/utils** — utilitaires (`cn`, `formatDate`, `formatCurrency`)
- **packages/config** — configs ESLint, Prettier, TS, Tailwind partagées

## Pattern Laravel — modules

Chaque domaine métier dans `app/Modules/<Module>/` :

```
Modules/Foo/
├── Controllers/        # contrôleurs HTTP minces
├── Services/           # logique métier
├── Repositories/       # accès DB (pas d'Eloquent dans les Services)
├── DTOs/               # objets de transfert immuables
├── Models/             # Eloquent
├── Requests/           # validation FormRequest
└── Routes/
```

## Stack frontend

- React Query → cache & data fetching
- Zustand → état global UI (auth, thème)
- React Hook Form + Zod → formulaires
- next-intl → i18n (FR par défaut)
- next-themes → dark/light

## Auth

- Laravel Sanctum (SPA + tokens)
- Spatie Permission → rôles `super_admin`, `admin`, `editor`, `viewer`

## Paiements

- Polymorphique : `payments.payable_type` + `payable_id`
- Providers : `orange_money`, `mtn_momo`, `wave`
- Webhooks → `/api/v1/webhooks/{provider}` (sans auth, signature vérifiée)
- Transactions DB obligatoires

## Realtime

- Laravel Reverb (WebSockets natifs Laravel)
