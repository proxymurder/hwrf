FROM smallstep/step-cli

USER root

# Install executables
COPY ./renewer.sh /renewer.sh
COPY ./docker-renewer-entrypoint /docker-renewer-entrypoint

# Install crontabs
ADD ./crontab /etc/crontabs/root

# Install permissions
RUN chmod +x /renewer.sh /docker-renewer-entrypoint
RUN chmod 0644 /etc/crontabs/root

# Install workdir
RUN mkdir -p /home/step/renewer
RUN chown step:step /home/step/renewer

WORKDIR /home/step/renewer

USER step

# Install certificates
ENTRYPOINT ["/docker-renewer-entrypoint"]

CMD ["/usr/sbin/crond", "-l", "2", "-f"]