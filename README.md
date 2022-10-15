## Smallstep (step)

### config

Configuration is no longer included. Upon clean install first thing that needs to be run is.

```
step ca init // inside ca docker service
```

This can also be set with env variables on the ca service. //TO-DO

```
\\ defaults.json
"ca-url":"https://ca" \\ docker-compose container name
```

```
\\ ca.json

"dnsNames": ["ca"],

 ...

"claims":
{
    "minTLSCertDuration": "22h",
    "maxTLSCertDuration": "8800h",
    "defaultTLSCertDuration": "4400h",
    "disableRenewal": false
} \\ not included in default configuration
```

# IMPORTANT

### Submodules (laravel-backend/vuejs-app)

currently this package is working with three template submodules. Upon creation of a new docker-core template
project, a project-backend and project-app have to be created from respective laravel-backend and vuejs-app templates. vuejs-app
template does not serve only as a main, required template but work too for any subsequencial app needed overtime (or new vuejs-app submodule).
