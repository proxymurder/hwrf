all: build local

build: certwatch-image php-image ssr-image app-image sockjs-image nginx-image

certwatch-image:
	docker build -t proxymurder/certwatch:latest ./step/certwatch
php-image:
	docker build -t proxymurder/php:latest --target php ./laravel-backend
ssr-image:
	docker build -t proxymurder/ssr:latest --target ssr ./laravel-backend
app-image:
	docker build -t proxymurder/app:latest ./vuejs-app
sockjs-image:
	docker build -t proxymurder/sockjs:latest ./sockjs 
nginx-image:
	docker build -t proxymurder/nginx:latest ./nginx 

local:
	docker compose up -d local
www:
	docker compose up -d www
rollback:
	docker compose down