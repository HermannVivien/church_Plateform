# Setup local

## Prérequis

- **Node 20+** + **pnpm 9** (`corepack enable && corepack prepare pnpm@9 --activate`)
- **PHP 8.3** + **Composer 2**
- **Docker Desktop** (pour MySQL, Redis, Mailpit)
- **make** (sur Windows, via WSL ou Git Bash)

## Étapes

```bash
# 1. Init git
git init && git add . && git commit -m "chore: initial scaffold"

# 2. Dépendances JS
pnpm install

# 3. Dépendances PHP (le scaffold ne contient PAS le squelette Laravel complet —
#    crée-le par-dessus apps/api ou installe les vendors)
cd apps/api && composer install
cd ../..

# 4. Env
cp .env.example .env
cp apps/api/.env.example apps/api/.env
cp apps/web/.env.example apps/web/.env.local
cp apps/admin/.env.example apps/admin/.env.local
cd apps/api && php artisan key:generate && cd ../..

# 5. Docker (MySQL, Redis, Mailpit)
docker compose -f infra/docker-compose.yml up -d mysql redis mailpit

# 6. Migrations + seeds
make migrate && make seed

# 7. Dev
pnpm dev
```

## URLs

- Site public : http://localhost:3000
- Admin : http://localhost:3001
- API : http://localhost:8000/api/v1 (ou http://localhost via nginx)
- Mailpit : http://localhost:8025
- MySQL : localhost:3306 (user `church_user` / password `secret`)

## Comptes seed

| Rôle | Email | Mot de passe |
|------|-------|--------------|
| super_admin | admin@church-platform.local | password |
| editor | editor@church-platform.local | password |
