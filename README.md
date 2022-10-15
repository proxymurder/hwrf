## Smallstep (step)

## Certificate Authority (CA)

### config

SmallStep CA is linked to step/ca folder. On clen install run:

```
docker compose run --rm ca step ca init
```

default variables are set to be

```
Deployment: Standalone          // to-do: Reserch deployment types.
PKI name:   ca                  // ca.json
DNS names:  ['ca']              // https://ca
CA Address: 5739                // 127.0.0.1:5739
Provisoner: example@email.com   // to-do: Reserch user/team
Password:   secret              // customize
```

password file needs to be created on the step/ca/secrets folder

```
printf "%s\n" "secret" > step/ca/secrets
```

```
\\ ca.json

"dnsNames": ["ca"],

...

authority: {
provisioners:[...],
"claims":
{
"minTLSCertDuration": "22h",
"maxTLSCertDuration": "8800h",
"defaultTLSCertDuration": "4400h",
"disableRenewal": false
}
}

```

## IMPORTANT

### Submodules (laravel-backend/vuejs-app)

currently this package is working with three template submodules. Upon creation of a new docker-core template
project, a project-backend and project-app have to be created from respective laravel-backend and vuejs-app templates. vuejs-app
template does not serve only as a main, required template but work too for any subsequencial app needed overtime (or new vuejs-app submodule).

```

```
