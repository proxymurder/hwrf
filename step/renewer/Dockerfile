FROM smallstep/step-cli

USER root

# Install executables
COPY ./script.sh /script.sh
COPY ./entrypoint.sh /entrypoint.sh

# Install crontabs
ADD ./crontab /etc/crontabs/root

# Install permissions
RUN chmod +x /entrypoint.sh /script.sh
RUN chmod 0644 /etc/crontabs/root

# Install certificates
ENTRYPOINT ["/entrypoint.sh"]

# Start crond
CMD ["/usr/sbin/crond", "-l", "2", "-f"]

USER step