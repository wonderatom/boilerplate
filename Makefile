.DEFAULT_GOAL := help

DOCKER_COMPOSE_CONFIG_FILE = 'docker/docker-compose.yml'

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-16s\033[0m %s\n", $$1, $$2}'

dc-up: ## Create and run docker containers, use docker-compose.yml
	docker-compose -f $(DOCKER_COMPOSE_CONFIG_FILE) up -d

dc-stop: ## Stop docker containers
	docker-compose -f docker/docker-compose.yml stop

dc-down: ## Stop and kill docker containers
	docker-compose -f docker/docker-compose.yml down

dc-start: ## Start docker-контейнеров
	docker-compose -f docker/docker-compose.yml start


build:
	docker-compose -f docker/docker-compose.yml run php-fpm composer create-project symfony/skeleton app

app-console:
	docker-compose -f docker/docker-compose.yml run php-fpm ./bin/console