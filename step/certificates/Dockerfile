FROM smallstep/step-cli

USER root

# Install smallstep binaries
COPY --from=smallstep/step-ca /usr/local/bin/step-ca /usr/local/bin/step-ca
COPY --from=smallstep/step-ca /usr/local/bin/step-awskms-init /usr/local/bin/step-awskms-init

# Install dependencies
RUN apk update
RUN apk add --no-cache libcap

# Install non-root port binding
RUN setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/step-ca

# Install executables
COPY ./docker-entrypoint /docker-entrypoint

# Install permissions
RUN chmod +x /docker-entrypoint

# Install workdir
RUN mkdir -p /home/step
RUN chown step:step /home/step

WORKDIR /home/step

USER step

# Initialize certificate authority
ENTRYPOINT ["/docker-entrypoint"]

CMD ["step-ca", "--password-file", "password", "config/ca.json"]