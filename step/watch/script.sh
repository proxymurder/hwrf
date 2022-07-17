#!/bin/sh

# Force renew certificates
step ca renew --force /home/step/site.crt /home/step/site.key

# Remove certificate from shared directory
rm -f /var/local/step/site.crt

# Copy certificate to shared directory
cp /home/step/site.crt /var/local/step/site.crt