## Git Modules

Proxyd works with three submodules:

-   [php/src](https://github.com/proxymurder/laravel-template) submodule which normally contain the API, as well as the OAuth endpoints.
-   [node/vue/app](https://github.com/proxymurder/vue-template) submodule which contain the vite generated static files for VueJS progressive web app (PWA). Vue template is replicable, to a point where most frontend code will be housed inside of `node/vue`, all of them using the same OAuth endpoints to authorize and validate data, aswell as the same Nginx frontend file, or a variant using another root directory.
-   [node/websockets/ws](https://github.com/proxymurder/ws-template) submodule which run's all of the in house websocket connections, utilities and optional express app.

All three submodules, aswell as proxyd repositoy, are templates and should be re-created too on new proxyd project.

## Makefile

Makefile at the root of project creates the different images to test (TO-DO: and deploy) the proxyd web infrastructure.

Run `make` command to build and launch local development environement containers, alternatively you can just run `make build-test`, `make build-test-{step|php|node|servers}` to build same stack images ,or `make test-{certificates|renewer|php|nphp|vue|websockets|nginx}` to build specific service images.

Run `make local|www|rollback` to build detached local development environement containers, production environement containers or destroy containers respectively.

## Docker compose

Docker compose file contains all the information about available services to make the infrastructure work. Environement variables are not included in an `.env` file at the root of the project but rather declared individually per service available. Services that require, large `.env` files, have them at the root of their respective project.
