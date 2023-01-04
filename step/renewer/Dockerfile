FROM smallstep/step-cli

USER root

# Install executables
COPY ./renewer.sh /renewer.sh
COPY ./docker-entrypoint /docker-entrypoint

# Install crontabs
ADD ./crontab /etc/crontabs/root

# Install permissions
RUN chmod +x /renewer.sh /docker-entrypoint
RUN chmod 0644 /etc/crontabs/root

# Install workdir
RUN mkdir -p /var/local/step
RUN chown step:step /var/local/step

WORKDIR /var/local/step

USER step

# Install certificates
ENTRYPOINT ["/docker-entrypoint"]

CMD ["/usr/sbin/crond", "-l", "2", "-f"]