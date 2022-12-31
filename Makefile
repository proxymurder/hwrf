all: build-test local

test: test-step test-php test-node test-servers

test-step: test-certificates test-renewer

test-php: test-laravel test-nphp

test-node: test-vue test-websockets

test-servers: test-nginx

test-certificates:
	docker build -t test/certificates:latest ./step/certificates
test-renewer:
	docker build -t test/renewer:latest ./step/renewer
test-laravel:
	docker build -t test/laravel:latest --target php ./laravel
test-nphp:
	docker build -t test/nphp:latest --target nphp ./laravel
test-vue:
	docker build -t test/vue:latest ./vue
test-websockets:
	docker build -t test/websockets:latest ./websockets
test-nginx:
	docker build -t test/nginx:latest ./nginx 

local:
	docker compose up -d local
www:
	docker compose up -d www
rollback:
	docker compose down