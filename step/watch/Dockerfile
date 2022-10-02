FROM smallstep/step-cli

USER root
RUN mkdir -p /var/local/step

# Install crontabs
COPY ./script.sh /script.sh
COPY ./entrypoint.sh /entrypoint.sh

ADD ./crontab /etc/crontabs/root

RUN chmod +x /entrypoint.sh /script.sh
RUN chmod 0644 /etc/crontabs/root

# Install certificates
ENTRYPOINT ["/entrypoint.sh"]

# Start crond
CMD ["/usr/sbin/crond", "-l", "2", "-f"]