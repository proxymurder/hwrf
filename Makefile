all: build-local local

build-test: build-test-step build-test-php build-test-node build-test-servers

build-test-step: test-certificates test-renewer

build-test-php: test-php test-nphp

build-test-node: test-app test-ws

build-test-servers: test-nginx

test-certificates:
	docker build -t test/certificates:latest ./step/certificates
test-renewer:
	docker build -t test/renewer:latest ./step/renewer
test-php:
	docker build -t test/php:latest --target php ./php
test-nphp:
	docker build -t test/nphp:latest --target nphp ./php
test-app:
	docker build -t test/vue:latest --target app ./node
test-ws:
	docker build -t test/websockets:latest --target ws ./node
test-nginx:
	docker build -t test/nginx:latest ./nginx 

local:
	docker compose up -d local
www:
	docker compose up -d www
rollback:
	docker compose down