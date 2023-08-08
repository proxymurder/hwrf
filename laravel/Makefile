all:

php-laravel:
	php-laravel-app php-laravel-npm

php-laravel-app:
	docker build -t proxymurder/php:laravel ./Dockerfile
php-laravel-npm:
	docker build -t proxymurder/node:laravel ./Dockerfile.js