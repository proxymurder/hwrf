# Smallstep CA (Certificate Authority)

To begin working with this project, first clone the repository and then pull the `smalltep/step-ca` image from the DockerHub:

```
git clone https://github.com/proxymurder/docker-smallstep-ca.git
```

```
docker pull smallstep/step-ca
```

This repository is an example of the file structure implemented by `step ca init`.

```
docker compose run --rm certauth step ca init
```

default variables are set to be:

```
Deployment: Standalone
PKI name:   ca
DNS names:  ['ca']
CA Address: 5739
Provisoner: example@email.com
Password:   *password*
```
