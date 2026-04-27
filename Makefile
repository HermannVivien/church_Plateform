.PHONY: help install dev build test lint migrate seed fresh logs shell-api shell-web stop reset

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
