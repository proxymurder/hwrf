# Smallstep

## Certificate Authority

SmallStep CA is linked to certificates folder. On clen install run:

`docker compose up -d certificates`

`STEPPATH`must be set to specify the location of `step` in the case where `/home/step` (default) is not used.
`STEPCA_INIT_NAME`, and `STEPCA_INIT_DNS` environement variables must be set for image to run.

password file needs to be created on the step/certauth/secrets folder:

Add the "authority.claims" property inside PKI config (certificates/config/ca.json).
Default TLSCertDurations are 60s.

```
authority: {
    "claims":{
    "minTLSCertDuration": "22h",
    "maxTLSCertDuration": "8800h",
    "defaultTLSCertDuration": "4400h",
    "disableRenewal": false
    },
    provisioners:[...],
}
```

## Certificate Renewer

Fingerprint and KID are available in respective config/defaults.json and config/ca.json.

Fingerprint is also available through:

`docker compose run --rm certificates step certificate fingerprint /home/step/certs/root_ca.crt`

Once SmallStep CA is up and running we can also retreive the KID through:

`docker compose exec certificates step ca provisioner list`
