## Git Modules

Proxyd works with three submodules:

-   Php submodule which normally contain the API, as well as the OAuth endpoints.
-   App submodule which contain the vite generated static files for VueJs PWA or SPA.
-   WebSocket submodule which run's all of the in house websocket connections and/or applications.

All three submodules, aswell as proxyd repositoy, are templates and should be created on new proxyd project.

## Makefile

Makefile at the root of project creates the different images to test (TO-DO: and deploy) the proxyd web infrastructure.

Run `make` command to build and launch local development environement containers, alternatively you can just run `make build-test`, `make build-test-{step|php|node|servers}` to build same stack images ,or `make test-{service}` to build specific images.

Lastly run `make local|www|rollback` to build detached local development environement containers, production environement containers or destroy containers respectively.
