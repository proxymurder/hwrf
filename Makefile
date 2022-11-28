all: build-local local

build-local: build-local-step build-local-laravel build-local-node build-local-servers

build-local-step: build-local-ca build-local-renewer

build-local-laravel: build-local-php build-local-nphp

build-local-node: build-local-app build-local-ws

build-local-servers: build-local-nginx

build-local-ca:
	docker build -t proxymurder/ca:local ./step/ca
build-local-renewer:
	docker build -t proxymurder/renewer:local ./step/renewer
build-local-php:
	docker build -t proxymurder/php:local --target php ./php
build-local-nphp:
	docker build -t proxymurder/nphp:local --target nphp ./php
build-local-app:
	docker build -t proxymurder/app:local --target app ./node
build-local-ws:
	docker build -t proxymurder/ws:local --target ws ./node
build-local-nginx:
	docker build -t proxymurder/nginx:local ./nginx 

local:
	docker compose up -d local
www:
	docker compose up -d www
rollback:
	docker compose down