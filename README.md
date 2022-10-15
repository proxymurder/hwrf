# Smallstep (step)

## Certificate Authority (CA)

### config

SmallStep CA is linked to step/ca folder. On clen install run:

```
docker compose run --rm ca step ca init
```

default variables are set to be:

```
Deployment: Standalone          // to-do: Reserch deployment types.
PKI name:   ca                  // ca.json
DNS names:  ['ca']              // https://ca
CA Address: 5739                // 127.0.0.1:5739
Provisoner: example@email.com   // to-do: Reserch user/team
Password:   secret              // customize
```

password file needs to be created on the step/ca/secrets folder:

```
printf "%s\n" "secret" > step/ca/secrets
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

# IMPORTANT

On a new repository from this template, modules need to be created from their respective templates too.

TO-DO: find out if I can create this recursively.

## Submodules

## [Php](php)

### [Laravel Backend](https://github.com/proxymurder/laravel-backend)

Laravel backend submodule contains API endpoints, and a complete OAuth Server implementation.

## [Node](node)

### [Vue Js App](https://github.com/proxymurder/vuejs-app)

Vue js app submodule for a static client side rendered single page application (SPA).

### [Node Js Websocket](https://github.com/proxymurder/websocket)

Node js websocket submodule to connect Redis server, Laravel broadcast/cache and display them in Vue js submodules.
