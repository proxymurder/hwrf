# IMPORTANT

When creating a new repository from this template, submodules need to be created from their respective templates too.

TO-DO: find out if I can create this recursively.

# Docker

## Build

Most Docker services have their own Dockerfile, and must be built before hand.
Build images using docker compose:

```
docker compose build
```

Copy .env.example to .env

```
cp .env.example .env
```

This comes in handy when it is time to install, for example; node modules or composer packages:

i.e backend dependencies

```
docker compose run --rm php composer install
docker compose run --rm laravel npm install
```

i.e frontend dependencies

```
docker compose run --rm app npm install
```

Redis, Smallstep Certificate Authority, mySQL and some services use a default Image or have not yet been configured for custom usage.

## Submodules

## [Php](php)

### [Laravel Backend](https://github.com/proxymurder/laravel-backend)

Laravel backend submodule contains API endpoints, and a complete OAuth Server implementation.

## [Node](node)

### [Vue Js App](https://github.com/proxymurder/vuejs-app)

Vue js app submodule for a static client side rendered web application.

### [Node Js Websocket](https://github.com/proxymurder/websocket)

Node js websocket submodule to connect Redis server, Laravel broadcast/cache and display them in Vue js submodules.

# [Smallstep](step)

## [Certificate Authority](step/certauth)

### config

SmallStep CA is linked to step/ca folder. On clen install run:

```
docker compose run --rm certauth step ca init
```

default variables are set to be:

```
Deployment: Standalone
PKI name:   ca
DNS names:  ['certauth']
CA Address: 5739
Provisoner: example@email.com
Password:   *password*
```

password file needs to be created on the step/certauth/secrets folder:

```
printf "%s\n" "secret" > step/certauth/secrets/password
```

Add the "authority.claims" property inside PKI config (ca.json).
Default TLSCertDurations are 60s.

```
\\ ca.json

authority: {
    provisioners:[...],
    "claims":{
    "minTLSCertDuration": "22h",
    "maxTLSCertDuration": "8800h",
    "defaultTLSCertDuration": "4400h",
    "disableRenewal": false
    },
}
```

## [Certificate Watcher](step/certwatch)

Fingerprint and KID are available in respective config/defaults.json and config/ca.json.

Fingerprint is also available through:

```
docker compose run --rm ca step certificate fingerprint /home/step/certs/root_ca.crt
```

Once SmallStep CA is up and running we can also retreive the KID through:

```
docker compose exec ca step ca provisioner list

// to-do: docker compose run --rm --service-ports certauth step ca provisioners list
// Command should work but it is not mapping ports.

```
