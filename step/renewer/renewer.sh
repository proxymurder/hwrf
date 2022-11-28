#!/bin/sh
# Force renew certificates
step ca renew --force "${STEP_CRT}" "${STEP_KEY}"