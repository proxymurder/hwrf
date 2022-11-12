all: build local

build: build-renewer build-php build-nphp build-frontend build-websockets build-nginx

build-ca:
	docker build -t proxymurder/ca:latest ./ca
build-renewer:
	docker build -t proxymurder/renewer:latest ./renewer
build-php:
	docker build -t proxymurder/php:latest --target php ./laravel
build-nphp:
	docker build -t proxymurder/nphp:latest --target nphp ./laravel
build-frontend:
	docker build -t proxymurder/frontend:latest ./vue
build-websockets:
	docker build -t proxymurder/websockets:latest ./websockets
build-nginx:
	docker build -t proxymurder/nginx:latest ./nginx 

local:
	docker compose up -d local
www:
	docker compose up -d www
rollback:
	docker compose down