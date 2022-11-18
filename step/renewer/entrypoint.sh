#!/bin/sh

# Wait for CA
sleep 5

# Clean old certificates
rm -f /home/step/root_ca.crt
rm -f /home/step/site.crt /home/step/site.key

# Donwload the root certificate
step ca root /home/step/root_ca.crt

# Get subject alternative names
for val in $DOMAINS; do
    TMP="--san=${val}"
    SAN="${SAN} ${TMP}"
done

# Get token
STEP_TOKEN=$(step ca token $COMMON_NAME $SAN)

# Donwload the root certificate
step ca certificate --token $STEP_TOKEN $COMMON_NAME /home/step/site.crt /home/step/site.key

exec "$@"