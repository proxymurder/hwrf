#!/bin/bash

export STEPPATH=$(step path)

# List of env vars required for step ca init
declare -ra REQUIRED_INIT_VARS=(DOCKER_STEPCA_INIT_NAME DOCKER_STEPCA_INIT_DNS DOCKER_STEPCA_INIT_ADDRESS)

# Ensure all env vars required to run step ca init are set.
function init () {
    local missing=0
    for var in "${REQUIRED_INIT_VARS[@]}"; do
        if [ -z "${!var}" ]; then
            missing=1
        fi
    done
    if [ ${missing} = 1 ]; then
		>&2 printf "%s\n" "ca.json config file missing; please run step ca init, or provide config parameters via DOCKER_STEPCA_INIT_ vars"
    else
        ca_init "${@}"
    fi
}

# Initialize a CA if not already initialized
function ca_init () {
    local -a setup_args=(
        --name "${DOCKER_STEPCA_INIT_NAME}"
        --dns "${DOCKER_STEPCA_INIT_DNS}"
        --provisioner "${DOCKER_STEPCA_INIT_PROVISIONER:-admin}"
        --password-file "${STEPPATH}/password"
        --address ":${DOCKER_STEPCA_INIT_ADDRESS}"
    )
    if [ -n "${DOCKER_STEPCA_INIT_PASSWORD}" ]; then
        printf "%s\n" "${DOCKER_STEPCA_INIT_PASSWORD}" > "${STEPPATH}/password"
    else
        printf "%s\n" "secret" > "${STEPPATH}/password"
    fi
    if [ -n "${DOCKER_STEPCA_INIT_SSH}" ]; then
        setup_args=("${setup_args[@]}" --ssh)
    fi
    step ca init "${setup_args[@]}"
}

if [ ! -f "${STEPPATH}/config/ca.json" ]; then
	init
fi

exec "${@}"