.DEFAULT_GOAL := help

DOCKER_COMPOSE_CONFIG_FILE = 'docker/docker-compose.yml'
ENV_FILE = '.env'

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-16s\033[0m %s\n", $$1, $$2}'

##############
##  Docker  ##
##############
dc-up: ## Build and run docker containers, use docker-compose.yml
	docker-compose --env-file $(ENV_FILE) -f $(DOCKER_COMPOSE_CONFIG_FILE) up --build -d

dc-down: ## Stop and kill docker containers
	docker-compose --env-file $(ENV_FILE) -f docker/docker-compose.yml down

#############
##  Build  ##
#############
app-create: ## Create symfony application
	cd docker/ && docker-compose exec application sh -c 'composer create-project symfony/skeleton .'

app-update: ## Composer update
	cd docker/ && docker-compose exec application sh -c 'composer update'

app-install: ## Composer install
	cd docker/ && docker-compose exec application sh -c 'composer install'

###################
##  Application  ##
###################
app-run-migration: ## Migrate DB
	cd docker/ && docker-compose exec application sh -c './bin/console doctrine:migrations:migrate -n'

app-run-test: ## Run unit and functional tests
	cd docker/ && docker-compose exec application sh -c './bin/phpunit'

app-hangar-place: ## Symfony bin/console
	cd docker/ && docker-compose exec application sh -c './bin/console app:hangar:place'

app-hangar-take-out: ## Symfony bin/console
	cd docker/ && docker-compose exec application sh -c './bin/console app:hangar:take-out'