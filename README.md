# IMPORTANT

### Submodules (laravel-api/vuejs-app)

currently this package is working with two submodules, both of them are templates aswell. Upon creation of a new docker-web-core template project, a laravel-api and vuejs-app have to be created as well. vuejs-app template not only serves as the main (obligatory) template but as the template to any other subdomain (vuejs-app submodule).

## Smallstep (step)

### config

Configuration is included so that user has an example. Whole contents of the step/ca can be removed and re-created upon creating step-ca service. By default if no configuration is present, terminal will immediately prompt for new config input. Service name must be the url, and later on some extra configuration is needed as to not auto-generate a new certificate each minute.

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
