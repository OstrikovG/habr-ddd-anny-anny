SHELL := /bin/bash

server-start: ## Start symfony server.
	symfony server:start -d;
.PHONY: server-run

server-stop: ## Stop symfony server.
	symfony server:stop;
.PHONY: server-stop


up: ## Start development docker environment.
	docker compose up -d
.PHONY: up

stop: ## Stop development docker environment.
	docker compose stop
.PHONY: stop

rebuild: ## Rebuild development docker environment.
	docker compose down
	docker compose up -d --build
.PHONY: rebuild

migrate: ## Run application migrations.
	symfony console doctrine:migrations:migrate
.PHONY: migrate

fixtures: ## Execute application fixtures.
	symfony console doctrine:fixtures:load
.PHONY: migrate