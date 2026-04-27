# API Reference

Base URL : `http://localhost/api/v1`

## Auth

| Méthode | Endpoint | Auth | Description |
|---------|----------|------|-------------|
| POST | `/auth/login` | — | Connexion (email + password) |
| POST | `/auth/register` | — | Inscription |
| POST | `/auth/logout` | sanctum | Déconnexion (révoque le token courant) |
| GET  | `/auth/me` | sanctum | Profil de l'utilisateur courant |

## Public

| Méthode | Endpoint | Description |
|---------|----------|-------------|
| GET | `/announcements` | Liste paginée des annonces publiées |
| GET | `/announcements/{slug}` | Détail d'une annonce |
| GET | `/sermons` | Liste des sermons |
| GET | `/clergy` | Membres du clergé |
| GET | `/verse/today` | Verset du jour |
| GET | `/gallery` | Galerie |

## Authentifié

| Méthode | Endpoint | Description |
|---------|----------|-------------|
| POST | `/mass-requests` | Demande de messe |
| POST | `/donations` | Initier un don |
| GET  | `/payments/{reference}/status` | Statut paiement |

## Admin (rôles `admin` ou `editor`)

Préfixe : `/admin`

- `apiResource` sur : `announcements`, `sermons`, `clergy`, `users`
- `GET /admin/payments`
- `GET /admin/dashboard/stats`

## Webhooks (sans auth)

- `POST /webhooks/orange-money`
- `POST /webhooks/mtn-momo`
- `POST /webhooks/wave`
