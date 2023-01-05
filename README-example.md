# IMPORTANT

When creating a new repository from this template, submodules need to be created from their respective templates too.

TO-DO: find out if I can create this recursively.

# Docker

## Build

Most Docker services have their own Dockerfile, and must be built before hand.
Build images using docker compose:

`docker compose build`

Copy .env.example to .env

`cp .env.example .env`

This comes in handy when it is time to install, for example; node modules or composer packages:

i.e frontend dependencies

`docker compose run --rm app npm install`

Redis, Smallstep Certificate Authority, mySQL and some services use a default Image or have not yet been configured for custom usage.

## Submodules

## [Php](php)

### [Laravel Backend](backend)

Laravel backend submodule contains API endpoints, and a complete OAuth Server implementation.
Php files are being executed with `php-fpm` through `php` docker service, and served with nginx `www-php` service.
Laravel backend depends on the mySQL `db` service and Redis `memory` service.
Vite server is available for development environement through the `laravel` service.

To install backend dependencies run:

`docker compose run --rm php composer instal`

`docker compose run --rm laravel npm install`

## [Node](node)

### [Vue Js App](https://github.com/proxymurder/vuejs-app)

Vue js app submodule for a static client side rendered web application.

### [Node Js Websocket](https://github.com/proxymurder/websocket)

Node js websocket submodule to connect Redis server, Laravel broadcast/cache and display them in Vue js submodules.
