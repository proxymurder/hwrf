# step/Dockerfile
# Smallstep certificate authority image
FROM smallstep/step-cli as ca

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
COPY ./docker-ca-entrypoint /docker-ca-entrypoint

# Install permissions
RUN chmod +x /docker-ca-entrypoint

USER step

# Initialize certificate authority
ENTRYPOINT ["/docker-ca-entrypoint"]

CMD ["step-ca", "--password-file", "/home/step/password", "/home/step/config/ca.json"]

# Smallstep certificate renewer image
FROM smallstep/step-cli as renewer

USER root

# Install executables
COPY ./renewer.sh /renewer.sh
COPY ./docker-renewer-entrypoint /docker-renewer-entrypoint

# Install crontabs
ADD ./crontab /etc/crontabs/root

# Install permissions
RUN chmod +x /renewer.sh /docker-renewer-entrypoint
RUN chmod 0644 /etc/crontabs/root

USER step

# Install certificates
ENTRYPOINT ["/docker-renewer-entrypoint"]

CMD ["/usr/sbin/crond", "-l", "2", "-f"]