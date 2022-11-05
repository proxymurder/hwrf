all: build

build: build-certwatch build-php build-ssr build-app build-sockjs build-nginx

build-certwatch:
	docker build -t proxymurder/certwatch:latest ./step/certwatch
build-php:
	docker build -t proxymurder/php:latest --target php ./laravel-backend
build-ssr:
	docker build -t proxymurder/ssr:latest --target ssr ./laravel-backend
build-app:
	docker build -t proxymurder/app:latest ./vuejs-app
build-sockjs:
	docker build -t proxymurder/sockjs:latest ./sockjs 
build-nginx:
	docker build -t proxymurder/nginx:latest ./nginx 

local:
	dockerc up -d local
www:
	dockerc up -d www
down:
	dockerc down