#!/bin/sh

# Wait for CA
sleep 5

# Clean old certificates
rm -f /home/step/root_ca.crt
rm -f /home/step/site.crt /home/step/site.key
rm -f /var/local/step/site.crt

# Donwload the root certificate
step ca root /home/step/root_ca.crt

# Get token
STEP_TOKEN=$(step ca token $STEP_NAME --san=${STEP_NAME} --san=*.${STEP_NAME})
# Donwload the root certificate
step ca certificate --token $STEP_TOKEN $STEP_NAME /home/step/site.crt /home/step/site.key

cp /home/step/site.crt /var/local/step/site.crt

exec "$@"